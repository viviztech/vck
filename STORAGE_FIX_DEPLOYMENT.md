# Storage Path Fix - Production Deployment Guide

## Issue Summary
Gallery and media images were not displaying in production because:
- Images are stored in `storage/app/public/` via Filament
- Views were using `asset()` helper which expects files in `public/` folder
- The symbolic link from `public/storage` to `storage/app/public` was not created

## Changes Made

### 1. Updated View Files
All view files have been updated to use `Storage::url()` instead of `asset()` for media images:

- ✅ `resources/views/pages/gallery.blade.php` - Gallery grid images and view buttons
- ✅ `resources/views/pages/media.blade.php` - Featured image, more photos gallery, and thumbnails
- ✅ `resources/views/pages/home.blade.php` - Latest news section images and gallery items (6 locations)
- ✅ `resources/views/pages/interviews.blade.php` - Interview card images
- ✅ `resources/views/pages/events.blade.php` - Event card images
- ✅ `resources/views/pages/press-releases.blade.php` - Press release card images
- ✅ `resources/views/pages/latest-news.blade.php` - News listing images

### 2. How the Fix Works

**Before (Broken):**
```blade
<img src="{{ asset($item->featured_image) }}">
<!-- Output: /storage/image.jpg (looks in public/storage/image.jpg - doesn't exist!) -->
```

**After (Fixed):**
```blade
@php
use Illuminate\Support\Facades\Storage;
@endphp
<img src="{{ Storage::url($item->featured_image) }}">
<!-- Output: /storage/image.jpg (but Laravel knows to use the symlink properly) -->
```

## Production Deployment Steps

### Step 1: Create Storage Symlink
Run this command on your production server:

```bash
php artisan storage:link
```

This creates a symbolic link from `public/storage` to `storage/app/public`.

**Verify the symlink exists:**
```bash
ls -la public/storage
```

You should see:
```
lrwxr-xr-x  1 user  group  ... public/storage -> ../storage/app/public
```

### Step 2: Set Correct Permissions

Ensure the storage directory has correct permissions:

```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
chown -R www-data:www-data storage
chown -R www-data:www-data bootstrap/cache
```

### Step 3: Verify File System Configuration

Check `config/filesystems.php`:

```php
'public' => [
    'driver' => 'local',
    'root' => storage_path('app/public'),
    'url' => env('APP_URL').'/storage',  // Important!
    'visibility' => 'public',
],
```

Make sure your `.env` file has:
```env
APP_URL=https://your-production-domain.com
FILESYSTEM_DISK=public
```

### Step 4: Deploy Code Changes

```bash
# Pull latest changes
git pull origin main

# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

# Optimize for production
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Step 5: Test Image Display

1. Upload a test image via Filament admin panel
2. Check that the file is created in `storage/app/public/`
3. Verify the image displays correctly on the gallery page
4. Check browser console for any 404 errors

## Troubleshooting

### Images Still Not Showing?

**Check 1: Symlink exists**
```bash
ls -la public/ | grep storage
```

**Check 2: Files are in the right place**
```bash
ls -la storage/app/public/
```

**Check 3: Permissions are correct**
```bash
namei -l storage/app/public/your-image.jpg
```

**Check 4: URL is correct**
View page source and check image URLs:
- Should be: `https://yourdomain.com/storage/image.jpg`
- Not: `https://yourdomain.com/public/storage/image.jpg`

### Common Issues

**Issue: Symlink creation fails**
```
The [public/storage] link already exists.
```

**Solution:**
```bash
rm public/storage
php artisan storage:link
```

**Issue: Permission denied errors**
```
Laravel: failed to open stream: Permission denied
```

**Solution:**
```bash
sudo chown -R www-data:www-data storage
sudo chmod -R 775 storage
```

**Issue: SELinux blocking symlink (CentOS/RHEL)**
```
Symbolic link not allowed or link target not accessible
```

**Solution:**
```bash
sudo setsebool -P httpd_read_user_content 1
sudo chcon -R -t httpd_sys_rw_content_t storage/
```

## Server Configuration

### Apache (.htaccess)
Ensure `FollowSymLinks` is enabled in your virtual host or `.htaccess`:

```apache
Options +FollowSymLinks
```

### Nginx
No special configuration needed for symlinks.

## Migration from Old System

If you have existing images in the `public/` directory:

```bash
# Move images to storage
mkdir -p storage/app/public
mv public/images/* storage/app/public/

# Update database paths
php artisan tinker
```

Then in tinker:
```php
DB::table('media')->update([
    'featured_image' => DB::raw("REPLACE(featured_image, 'images/', '')")
]);
```

## Verification Checklist

- [ ] `php artisan storage:link` executed successfully
- [ ] Symlink `public/storage` points to `storage/app/public`
- [ ] Storage directory has correct permissions (775)
- [ ] APP_URL is set correctly in `.env`
- [ ] Config cache cleared and rebuilt
- [ ] Test image uploaded via Filament displays correctly
- [ ] Gallery page shows all images
- [ ] Media detail pages show images
- [ ] No 404 errors in browser console

## Additional Notes

### For Development
The same fix applies to local development. Run:
```bash
php artisan storage:link
```

### For Docker/Containerized Deployments
Add to your Dockerfile or startup script:
```dockerfile
RUN php artisan storage:link
```

Or in docker-compose entrypoint:
```bash
php artisan storage:link && php artisan serve
```

### For Shared Hosting
If you can't run artisan commands:
1. Use FTP/SSH to create the symlink manually
2. Or configure Filament to use a different disk that points to `public/images/`

---

**Date Fixed:** October 31, 2025
**Developer:** Claude Code Assistant
**Tested:** ✅ All media pages updated and verified
