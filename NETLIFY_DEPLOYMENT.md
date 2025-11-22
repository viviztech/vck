# Netlify Deployment Guide for Laravel Application

## ⚠️ Important: Netlify Limitations

**Netlify does NOT natively support PHP/Laravel applications.** Netlify is designed for:
- Static site generators (Jekyll, Hugo, Gatsby, Next.js, etc.)
- Serverless functions (Node.js, Go, Python)
- Client-side applications (React, Vue, etc.)

A Laravel application requires:
- PHP runtime (not supported on Netlify's main platform)
- Persistent server environment
- Database connections
- File storage
- Background job processing (queues)

## Deployment Options

### Option 1: ❌ Netlify (NOT Recommended for Laravel)

Netlify cannot host a full Laravel application without significant workarounds:

**Challenges:**
- No PHP runtime on main platform
- No persistent file storage
- No database hosting
- Complex workarounds required
- Poor performance for dynamic applications

**If you must use Netlify:**
1. Use Netlify Functions with PHP runtime (Bref/Serverless PHP)
2. Move Laravel to separate hosting (API)
3. Deploy only frontend assets to Netlify
4. Use Netlify Edge Functions for routing

**This approach is complex and not recommended.**

---

### Option 2: ✅ Recommended Alternatives for Laravel

#### 2.1 Laravel Vapor (AWS Serverless)
**Best for:** Production Laravel applications
- Serverless Laravel hosting
- Auto-scaling
- Queue workers
- Database support
- File storage (S3)
- CDN included

**Deploy:**
```bash
composer require laravel/vapor-cli --global
vapor deploy production
```

#### 2.2 Heroku
**Best for:** Easy deployment, quick setup
- One-click deployment
- Add-ons for databases
- File storage support
- Queue workers

**Deploy:**
```bash
# Add Procfile
echo "web: vendor/bin/heroku-php-apache2 public/" > Procfile

# Deploy
git push heroku main
```

#### 2.3 DigitalOcean App Platform
**Best for:** Managed hosting with simplicity
- Automatic deployments from Git
- Database included
- File storage support
- Queue workers

#### 2.4 Railway
**Best for:** Modern deployment experience
- Git-based deployment
- Database included
- File storage support
- Simple pricing

**Deploy:**
```bash
# Connect your GitHub repo
# Railway auto-detects Laravel
```

#### 2.5 Traditional VPS (DigitalOcean, Linode, etc.)
**Best for:** Full control, cost-effective
- Complete server control
- Install any software
- Best for production

**Use Laravel Forge for easy management:**
- One-click server setup
- Automatic deployments
- SSL certificates
- Queue workers

#### 2.6 Shared Hosting (Your Current Setup)
**Best for:** Simple, cost-effective
- Already working on Hostinger
- Easy to manage
- Cost-effective

---

## If You Still Want to Use Netlify (Advanced)

### Approach 1: Hybrid Deployment

1. **Deploy Laravel API separately** (Railway, Heroku, DigitalOcean)
2. **Deploy frontend assets to Netlify**:
   - Build assets: `npm run build`
   - Deploy `public/` directory
   - Use Netlify for CDN/static files
   - Make API calls to separate Laravel server

**Setup:**
```bash
# Build assets
npm run build

# The public/ directory can be deployed to Netlify
# But it won't work without a PHP server
```

### Approach 2: Netlify Functions with PHP

1. Install PHP runtime plugin:
```bash
npm install --save-dev @netlify/plugin-functions
```

2. Convert Laravel routes to Netlify Functions (complex, not recommended)

3. Use serverless PHP runtime (Bref)

**This requires significant refactoring.**

---

## Recommended: Deploy to Laravel-Friendly Platform

### Quick Setup with Railway (Recommended for Netlify-like Experience)

1. **Create `railway.json`:**
```json
{
  "$schema": "https://railway.app/railway.schema.json",
  "build": {
    "builder": "NIXPACKS",
    "buildCommand": "composer install --no-dev --optimize-autoloader && npm install && npm run build"
  },
  "deploy": {
    "startCommand": "php artisan serve --host=0.0.0.0 --port=$PORT",
    "healthcheckPath": "/",
    "healthcheckTimeout": 100
  }
}
```

2. **Create `Procfile` (for Heroku compatibility):**
```
web: vendor/bin/heroku-php-apache2 public/
```

3. **Connect GitHub and deploy**

### Quick Setup with Laravel Vapor

1. **Install Vapor CLI:**
```bash
composer require laravel/vapor-cli --global
```

2. **Initialize Vapor:**
```bash
vapor install
```

3. **Deploy:**
```bash
vapor deploy production
```

---

## Build Scripts for Netlify (Assets Only)

Even if you deploy Laravel elsewhere, you can use Netlify to build and serve assets:

### `package.json` - Add Netlify Build Script

```json
{
  "scripts": {
    "build": "vite build",
    "build:netlify": "npm install && npm run build && php artisan config:cache && php artisan route:cache && php artisan view:cache"
  }
}
```

### Netlify Build Settings

**Build command:**
```bash
npm run build:netlify
```

**Publish directory:**
```
public
```

**Environment variables** (in Netlify dashboard):
- `APP_ENV=production`
- `APP_DEBUG=false`
- `NODE_VERSION=20`
- `PHP_VERSION=8.2` (if using PHP functions)

---

## Current Project Setup

### Files Created for Netlify Compatibility:

1. **`netlify.toml`** - Netlify configuration
   - Build commands
   - Redirects
   - Headers
   - Cache settings

2. **`NETLIFY_DEPLOYMENT.md`** - This guide

### Required Environment Variables:

Set these in your deployment platform (NOT Netlify for full Laravel):

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

# Mail configuration
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your-username
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@yourdomain.com
MAIL_FROM_NAME="${APP_NAME}"

# Razorpay (if used)
RAZORPAY_KEY=your-key
RAZORPAY_SECRET=your-secret
```

---

## Deployment Checklist

### Before Deployment:

- [ ] Set `APP_ENV=production`
- [ ] Set `APP_DEBUG=false`
- [ ] Generate `APP_KEY`: `php artisan key:generate`
- [ ] Run migrations: `php artisan migrate --force`
- [ ] Build assets: `npm run build`
- [ ] Clear caches: `php artisan optimize:clear`
- [ ] Cache config: `php artisan config:cache`
- [ ] Cache routes: `php artisan route:cache`
- [ ] Cache views: `php artisan view:cache`
- [ ] Create storage symlink: `php artisan storage:link`
- [ ] Set file permissions: `chmod -R 755 storage bootstrap/cache`

### During Deployment:

- [ ] Install dependencies: `composer install --no-dev --optimize-autoloader`
- [ ] Install NPM packages: `npm ci --production`
- [ ] Build assets: `npm run build`
- [ ] Run database migrations: `php artisan migrate --force`
- [ ] Create storage symlink: `php artisan storage:link`
- [ ] Cache everything: `php artisan optimize`

### After Deployment:

- [ ] Test the application
- [ ] Verify storage symlink works
- [ ] Check file uploads work
- [ ] Test database connections
- [ ] Verify email sending
- [ ] Check queue workers (if used)
- [ ] Test payment processing (if used)
- [ ] Verify SSL certificate

---

## Recommendation

**For this Laravel application, do NOT use Netlify.** Instead:

1. **Best Option:** Use **Railway** or **Laravel Vapor**
   - Easy Git-based deployment
   - Automatic scaling
   - Database included
   - Modern developer experience

2. **Alternative:** Continue with **Hostinger** (your current setup)
   - Already working
   - Cost-effective
   - Familiar interface

3. **For Advanced Users:** Use **DigitalOcean + Laravel Forge**
   - Full control
   - Professional setup
   - Best performance

The `netlify.toml` file has been created but is primarily useful for:
- Building assets in CI/CD
- Serving static files from CDN
- As a reference for other platforms

---

## Need Help?

- **Laravel Vapor Docs:** https://docs.vapor.build/
- **Railway Docs:** https://docs.railway.app/
- **Heroku Laravel Guide:** https://devcenter.heroku.com/articles/getting-started-with-laravel
- **DigitalOcean Laravel:** https://www.digitalocean.com/community/tags/laravel

---

**Last Updated:** Created for VCK Laravel Application
**Recommended Platform:** Railway or Laravel Vapor (NOT Netlify)

