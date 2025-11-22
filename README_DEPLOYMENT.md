# VCK Laravel Application - Deployment Guide

## 📋 Quick Overview

This Laravel application is **NOT compatible with Netlify** (which doesn't support PHP). However, deployment files have been created for multiple platforms.

## 🚀 Recommended Platforms

### 1. Railway (Easiest - Similar to Netlify Experience)
**✅ Recommended for beginners**

- Git-based deployment
- Auto-detects Laravel
- Database included
- Simple pricing

[Read Railway Deployment Guide →](DEPLOYMENT_QUICK_START.md#1-railway-easiest---recommended)

### 2. Laravel Vapor (Production-Ready)
**✅ Recommended for production**

- AWS serverless
- Auto-scaling
- Queue workers
- CDN included

### 3. Heroku
**✅ Quick setup**

- One-click deployment
- Add-ons for databases
- Easy to use

### 4. DigitalOcean App Platform
**✅ Managed hosting**

- Professional setup
- Good performance
- Easy scaling

### 5. Hostinger (Current Setup)
**✅ Keep using if working**

Your current Hostinger setup works fine. Just ensure:
- Storage symlink exists
- File permissions are correct
- `.htaccess` files are in place

## 📁 Files Created

### Deployment Configuration Files:
- ✅ `netlify.toml` - Netlify config (for reference, not recommended)
- ✅ `railway.json` - Railway deployment config (recommended)
- ✅ `Procfile` - Heroku deployment config
- ✅ `.nvmrc` - Node version specification (v20)
- ✅ `deploy.sh` - Automated deployment script

### Documentation:
- ✅ `NETLIFY_DEPLOYMENT.md` - Complete deployment guide
- ✅ `DEPLOYMENT_QUICK_START.md` - Quick start guide
- ✅ `README_DEPLOYMENT.md` - This file

### Updated Files:
- ✅ `package.json` - Added build scripts for different platforms

## 🛠️ Quick Start

### Option 1: Use Automated Script

```bash
# Make script executable (first time only)
chmod +x deploy.sh

# Deploy for production
./deploy.sh production

# Deploy for Railway
./deploy.sh railway

# Deploy for Heroku
./deploy.sh heroku
```

### Option 2: Manual Deployment

```bash
# 1. Install dependencies
composer install --no-dev --optimize-autoloader
npm ci

# 2. Build assets
npm run build

# 3. Generate app key
php artisan key:generate

# 4. Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 5. Run migrations
php artisan migrate --force

# 6. Create storage symlink
php artisan storage:link

# 7. Optimize
php artisan optimize
```

## ⚠️ Important Notes

### Netlify Limitation
**Netlify does NOT support PHP/Laravel applications.** The `netlify.toml` file is provided for reference only. For a Laravel app, you must use a platform that supports PHP.

### Why Netlify Won't Work
- ❌ No PHP runtime
- ❌ No persistent file storage
- ❌ No database hosting
- ❌ No background job processing

### What Works Instead
- ✅ Railway (Git-based, auto-detects Laravel)
- ✅ Laravel Vapor (AWS serverless)
- ✅ Heroku (Easy deployment)
- ✅ DigitalOcean App Platform (Managed)
- ✅ Traditional VPS (Full control)

## 📚 Documentation

- **[DEPLOYMENT_QUICK_START.md](DEPLOYMENT_QUICK_START.md)** - Step-by-step guides for each platform
- **[NETLIFY_DEPLOYMENT.md](NETLIFY_DEPLOYMENT.md)** - Detailed explanation and alternatives
- **[STORAGE_FIX_DEPLOYMENT.md](STORAGE_FIX_DEPLOYMENT.md)** - Storage configuration guide

## 🔧 Environment Variables

Required environment variables for deployment:

```env
APP_NAME="VCK"
APP_ENV=production
APP_KEY=base64:your-generated-key
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_CONNECTION=mysql
DB_HOST=your-db-host
DB_PORT=3306
DB_DATABASE=your-database
DB_USERNAME=your-username
DB_PASSWORD=your-password

FILESYSTEM_DISK=public

# Mail, Razorpay, etc. (see full list in DEPLOYMENT_QUICK_START.md)
```

## ✅ Deployment Checklist

- [ ] Environment variables set
- [ ] Database configured and accessible
- [ ] Migrations run successfully
- [ ] Storage symlink created
- [ ] File permissions correct (755 for storage)
- [ ] Assets built (`npm run build`)
- [ ] Configuration cached
- [ ] `APP_ENV=production`
- [ ] `APP_DEBUG=false`
- [ ] SSL certificate active
- [ ] Application tested

## 🆘 Need Help?

1. Check **[DEPLOYMENT_QUICK_START.md](DEPLOYMENT_QUICK_START.md)** for platform-specific guides
2. Review **[NETLIFY_DEPLOYMENT.md](NETLIFY_DEPLOYMENT.md)** for detailed explanations
3. Use the automated script: `./deploy.sh [platform]`

## 💡 Recommendation

**For this Laravel application, use Railway** - it provides a Netlify-like experience (Git-based deployment, auto-detection) but supports PHP/Laravel properly.

---

**Created:** Deployment configuration for VCK Laravel Application
**Last Updated:** Current date
**Status:** ✅ Ready for deployment on Laravel-compatible platforms

