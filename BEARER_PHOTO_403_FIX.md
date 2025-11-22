# Bearer Photo 403 Forbidden Error - Server Fix Guide

## Problem
Bearer photos are getting 403 Forbidden error on the production server:
- URL: `https://forestgreen-curlew-727151.hostingersite.com/storage/bearers/01KAN31WN3C2Y0EGD8FW01A1V6.png`
- Error: 403 Forbidden

## Root Causes
The 403 error typically occurs due to:
1. **Missing or broken storage symlink** - The `public/storage` symlink doesn't exist or is broken
2. **Incorrect file permissions** - The web server can't read the files
3. **Missing .htaccess file** - The storage directory needs proper access rules

## Server-Side Fix Steps

### Step 1: Verify/Create Storage Symlink

SSH into your production server and run:

```bash
# Navigate to your project root
cd /path/to/your/project

# Check if symlink exists
ls -la public/ | grep storage

# If it doesn't exist or is broken, create it
php artisan storage:link

# Verify the symlink
ls -la public/storage
# Should show: lrwxrwxrwx ... public/storage -> ../storage/app/public
```

If `php artisan storage:link` fails, manually create it:

```bash
# Remove existing broken symlink if it exists
rm -rf public/storage

# Create symlink manually
ln -s ../storage/app/public public/storage

# Verify
ls -la public/storage
```

### Step 2: Set Correct Permissions

Set proper permissions for storage directories:

```bash
# Set permissions for storage directory
chmod -R 755 storage
chmod -R 755 storage/app/public

# Set permissions for bearer photos specifically
chmod -R 755 storage/app/public/bearers

# If you have access to chown (may require sudo)
chown -R www-data:www-data storage/app/public
# OR if www-data doesn't work, try:
chown -R apache:apache storage/app/public
# OR check your web server user:
ps aux | grep -E 'apache|httpd|nginx'

# For Hostinger, try:
chown -R $(whoami):$(whoami) storage/app/public
chmod -R 755 storage/app/public
```

### Step 3: Create .htaccess in Storage Directory

Create a `.htaccess` file in `storage/app/public/` to allow access:

```bash
# Create .htaccess file
cat > storage/app/public/.htaccess << 'EOF'
<IfModule mod_rewrite.c>
    Options +FollowSymLinks
    Options -Indexes
    RewriteEngine On
</IfModule>

# Allow access to image files
<FilesMatch "\.(jpg|jpeg|png|gif|webp|svg|ico)$">
    Order Allow,Deny
    Allow from all
</FilesMatch>
EOF
```

### Step 4: Create .htaccess in Bearers Directory

Create a `.htaccess` file in `storage/app/public/bearers/`:

```bash
# Create .htaccess file for bearers directory
cat > storage/app/public/bearers/.htaccess << 'EOF'
<IfModule mod_rewrite.c>
    Options +FollowSymLinks
    Options -Indexes
    RewriteEngine On
</IfModule>

# Allow access to all files in bearers directory
<FilesMatch ".*">
    Order Allow,Deny
    Allow from all
</FilesMatch>
EOF
```

### Step 5: Verify File Exists

Check if the actual file exists:

```bash
# Check if the file exists
ls -la storage/app/public/bearers/01KAN31WN3C2Y0EGD8FW01A1V6.png

# Check all bearer photos
ls -la storage/app/public/bearers/

# Verify permissions
stat storage/app/public/bearers/01KAN31WN3C2Y0EGD8FW01A1V6.png
```

### Step 6: Test Direct Access

Test if you can access the file directly:

```bash
# From the server, try:
curl -I https://forestgreen-curlew-727151.hostingersite.com/storage/bearers/01KAN31WN3C2Y0EGD8FW01A1V6.png

# Should return HTTP 200, not 403
```

### Step 7: Clear Cache (if needed)

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

## For Hostinger Shared Hosting

If you're on Hostinger shared hosting and can't SSH, use File Manager:

1. **Create Storage Symlink via File Manager:**
   - Go to File Manager in Hostinger control panel
   - Navigate to `public` folder
   - Delete `storage` folder if it exists (it might be a regular folder, not a symlink)
   - Contact Hostinger support to create the symlink, or use their terminal if available

2. **Set Permissions via File Manager:**
   - Navigate to `storage/app/public`
   - Right-click → Change Permissions
   - Set to `755` or `775`
   - Do the same for `storage/app/public/bearers`

3. **Upload .htaccess files:**
   - Create `.htaccess` file in `storage/app/public/` with the content from Step 3
   - Create `.htaccess` file in `storage/app/public/bearers/` with the content from Step 4

## Alternative Solution: Use Storage::url() Method

The code has been updated to use `Storage::disk('public')->url()` which is the Laravel-recommended method. Make sure your `.env` file has:

```env
APP_URL=https://forestgreen-curlew-727151.hostingersite.com
FILESYSTEM_DISK=public
```

## Verification Checklist

After applying fixes, verify:

- [ ] `php artisan storage:link` executed successfully
- [ ] Symlink `public/storage` points to `storage/app/public`
- [ ] `storage/app/public/bearers/` directory has 755 permissions
- [ ] Bearer photo files exist in `storage/app/public/bearers/`
- [ ] `.htaccess` files are in place (if needed)
- [ ] Direct URL access works: `https://yourdomain.com/storage/bearers/filename.png`
- [ ] Photos display correctly on office-bearers page
- [ ] Photos display correctly on leadership page

## Quick Test Command

Run this to test everything at once:

```bash
# Test if symlink exists and is valid
[ -L public/storage ] && echo "✓ Symlink exists" || echo "✗ Symlink missing"

# Test if file exists
[ -f storage/app/public/bearers/01KAN31WN3C2Y0EGD8FW01A1V6.png ] && echo "✓ File exists" || echo "✗ File missing"

# Test permissions
[ -r storage/app/public/bearers/01KAN31WN3C2Y0EGD8FW01A1V6.png ] && echo "✓ File is readable" || echo "✗ File not readable"
```

## Still Getting 403?

If you're still getting 403 after all these steps:

1. **Check web server logs:**
   ```bash
   tail -f /var/log/apache2/error.log
   # OR
   tail -f /var/log/nginx/error.log
   ```

2. **Contact Hostinger support** with:
   - The error message
   - The URL that's failing
   - Request them to check:
     - Symlink `public/storage` → `storage/app/public`
     - File permissions for `storage/app/public/bearers/`
     - Web server configuration for following symlinks

3. **Try alternative: Move files to public directory** (last resort):
   ```bash
   # Create directory in public
   mkdir -p public/images/bearers
   
   # Copy files
   cp storage/app/public/bearers/* public/images/bearers/
   
   # Update BearerForm.php to use 'public' disk with 'images/bearers' directory
   ```

## Code Changes Applied

The following code changes have been made to use proper Laravel Storage methods:

- ✅ `resources/views/pages/office-bearers.blade.php` - Uses `Storage::disk('public')->url($bearer->photo)`
- ✅ `resources/views/pages/leadership.blade.php` - Uses `Storage::disk('public')->url($bearer->photo)`
- ✅ `app/Models/Bearer.php` - Has `photo_url` accessor (backup method)
- ✅ `app/Filament/Resources/Bearers/Tables/BearersTable.php` - Uses `disk('public')` for ImageColumn

These changes ensure the URLs are generated correctly. The 403 error is purely a server-side configuration issue.

---
**Date:** Created to fix 403 Forbidden error on production server
**Server:** Hostinger (forestgreen-curlew-727151.hostingersite.com)

