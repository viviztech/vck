# Quick Deployment Guide

## ⚠️ Important: Netlify Doesn't Support Laravel

**Netlify does NOT support PHP/Laravel applications natively.** See `NETLIFY_DEPLOYMENT.md` for full details.

## ✅ Recommended Platforms

### 1. Railway (Easiest - Recommended)
**Deploy in 5 minutes:**

1. Go to [railway.app](https://railway.app)
2. Click "New Project" → "Deploy from GitHub"
3. Select this repository
4. Railway auto-detects Laravel and uses `railway.json`
5. Add environment variables (see below)
6. Add MySQL database (Railway dashboard)
7. Done! 🚀

**Environment Variables:**
```env
APP_NAME=VCK
APP_ENV=production
APP_KEY=base64:your-generated-key
APP_DEBUG=false
APP_URL=https://your-app.railway.app

DB_CONNECTION=mysql
DB_HOST=your-railway-db-host
DB_PORT=3306
DB_DATABASE=railway
DB_USERNAME=root
DB_PASSWORD=your-railway-db-password

FILESYSTEM_DISK=public
```

### 2. Laravel Vapor (AWS Serverless)
**Best for production, auto-scaling:**

```bash
# Install Vapor CLI
composer require laravel/vapor-cli --global

# Initialize Vapor
vapor install

# Deploy
vapor deploy production
```

### 3. Heroku
**Quick deployment:**

```bash
# Login to Heroku
heroku login

# Create app
heroku create your-app-name

# Add MySQL addon
heroku addons:create jawsdb:kitefin

# Set environment variables
heroku config:set APP_KEY=$(php artisan key:generate --show)

# Deploy
git push heroku main

# Run migrations
heroku run php artisan migrate --force

# Create storage symlink
heroku run php artisan storage:link
```

### 4. DigitalOcean App Platform
**Managed hosting:**

1. Go to [cloud.digitalocean.com](https://cloud.digitalocean.com)
2. Create App → Connect GitHub
3. Select this repository
4. Configure build settings:
   - Build Command: `composer install --no-dev --optimize-autoloader && npm ci && npm run build`
   - Run Command: `php artisan serve --host=0.0.0.0 --port=$PORT`
5. Add database
6. Add environment variables
7. Deploy

### 5. Continue with Hostinger (Current Setup)
**If it's working, keep it!**

Your current Hostinger setup is fine. Just ensure:
- ✅ Storage symlink exists: `php artisan storage:link`
- ✅ File permissions: `chmod -R 755 storage bootstrap/cache`
- ✅ `.htaccess` files are in place (already created)

---

## Pre-Deployment Checklist

Run these commands before deploying:

```bash
# 1. Install dependencies
composer install --no-dev --optimize-autoloader
npm ci

# 2. Build assets
npm run build

# 3. Generate app key (if not exists)
php artisan key:generate

# 4. Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 5. Run migrations
php artisan migrate --force

# 6. Create storage symlink
php artisan storage:link
```

---

## Environment Variables Template

Copy this to your deployment platform:

```env
# Application
APP_NAME="VCK"
APP_ENV=production
APP_KEY=base64:your-generated-key
APP_DEBUG=false
APP_URL=https://your-domain.com

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

# Filesystem
FILESYSTEM_DISK=public

# Mail
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@yourdomain.com
MAIL_FROM_NAME="${APP_NAME}"

# Razorpay (if used)
RAZORPAY_KEY=your_razorpay_key
RAZORPAY_SECRET=your_razorpay_secret

# Session
SESSION_DRIVER=database
SESSION_LIFETIME=120
```

---

## Post-Deployment Checklist

After deployment, verify:

- [ ] Application loads correctly
- [ ] Database connection works
- [ ] File uploads work (check storage symlink)
- [ ] Images display correctly
- [ ] Admin panel accessible (Filament)
- [ ] Email sending works (test contact form)
- [ ] Queue workers running (if used)
- [ ] SSL certificate active
- [ ] Environment is production (`APP_ENV=production`)
- [ ] Debug is off (`APP_DEBUG=false`)

---

## Troubleshooting

### Images Not Showing
```bash
# Create storage symlink
php artisan storage:link

# Check permissions
chmod -R 755 storage/app/public
```

### 500 Error
```bash
# Clear caches
php artisan optimize:clear

# Check logs
tail -f storage/logs/laravel.log
```

### Database Connection Failed
- Check database credentials in `.env`
- Verify database host is accessible
- Check firewall rules

### Build Fails
```bash
# Clear npm cache
npm cache clean --force

# Delete node_modules and reinstall
rm -rf node_modules package-lock.json
npm install
```

---

## Files Created for Deployment

1. **`netlify.toml`** - Netlify config (not recommended for Laravel)
2. **`railway.json`** - Railway deployment config (recommended)
3. **`Procfile`** - Heroku deployment config
4. **`.nvmrc`** - Node version specification
5. **`DEPLOYMENT_QUICK_START.md`** - This file
6. **`NETLIFY_DEPLOYMENT.md`** - Full deployment guide

---

## Need Help?

- Railway Docs: https://docs.railway.app/
- Laravel Vapor: https://docs.vapor.build/
- Heroku Laravel: https://devcenter.heroku.com/articles/getting-started-with-laravel

**Recommendation:** Use **Railway** for the easiest deployment experience similar to Netlify.

