# Railway Healthcheck Fix Guide

## Problem
Railway healthcheck was failing with error:
```
1/1 replicas never became healthy!
Healthcheck failed!
```

## Root Causes

1. **Wrong Healthcheck Path**: Using "/" which requires database connection and full app bootstrap
2. **Short Timeout**: 100 seconds might not be enough for first startup
3. **Build Command Issues**: Caching config/routes during build when database might not be available

## Solution Applied

### 1. Updated `railway.json`

**Changes:**
- ✅ Changed `healthcheckPath` from `"/"` to `"/up"` (Laravel's built-in health endpoint)
- ✅ Increased `healthcheckTimeout` from `100` to `300` seconds
- ✅ Removed config/route/view caching from build command (moved to startup)

**Why `/up` endpoint?**
- Laravel's `/up` endpoint is lightweight and doesn't require database connection
- It only checks if the application can respond, not full functionality
- Perfect for healthchecks during deployment

### 2. Build Command Optimization

**Before:**
```json
"buildCommand": "composer install --no-dev --optimize-autoloader && npm ci && npm run build && php artisan config:cache && php artisan route:cache && php artisan view:cache"
```

**After:**
```json
"buildCommand": "composer install --no-dev --optimize-autoloader && npm ci && npm run build"
```

**Why?**
- Config/route caching requires database connection
- During build phase, database might not be available yet
- Better to cache after deployment when database is ready

## Post-Deployment Optimization

After successful deployment, you can optimize by running:

```bash
# SSH into Railway or use Railway CLI
railway run php artisan config:cache
railway run php artisan route:cache
railway run php artisan view:cache
railway run php artisan optimize
```

Or add these to a startup script if needed.

## Required Environment Variables

Make sure these are set in Railway dashboard:

```env
APP_NAME=VCK
APP_ENV=production
APP_KEY=base64:your-generated-key
APP_DEBUG=false
APP_URL=https://your-app.railway.app

DB_CONNECTION=mysql
DB_HOST=${{MySQL.HOSTNAME}}
DB_PORT=${{MySQL.PORT}}
DB_DATABASE=${{MySQL.DATABASE}}
DB_USERNAME=${{MySQL.USERNAME}}
DB_PASSWORD=${{MySQL.PASSWORD}}

FILESYSTEM_DISK=public
```

## Verification Steps

1. **Check Health Endpoint:**
   ```bash
   curl https://your-app.railway.app/up
   ```
   Should return: `{"status":"ok"}`

2. **Check Application:**
   ```bash
   curl https://your-app.railway.app/
   ```
   Should return your homepage

3. **Check Logs:**
   ```bash
   railway logs
   ```
   Look for any errors during startup

## Additional Troubleshooting

### If healthcheck still fails:

1. **Check Database Connection:**
   - Ensure MySQL service is running
   - Verify database credentials in environment variables
   - Check if database is accessible from your app

2. **Check Application Logs:**
   ```bash
   railway logs --tail
   ```

3. **Verify Port Configuration:**
   - Railway automatically sets `$PORT` environment variable
   - Make sure start command uses `--port=$PORT`

4. **Check PHP Version:**
   - Ensure Railway is using PHP 8.3+
   - Check `composer.json` requires `"php": "^8.3"`

5. **Storage Permissions:**
   ```bash
   railway run chmod -R 755 storage bootstrap/cache
   railway run php artisan storage:link
   ```

6. **Run Migrations:**
   ```bash
   railway run php artisan migrate --force
   ```

## Alternative: Use Procfile

If issues persist, you can also use a `Procfile`:

```
web: php artisan serve --host=0.0.0.0 --port=$PORT
```

Railway will auto-detect this and use it instead of `railway.json` startCommand.

## Success Indicators

✅ Healthcheck passes
✅ Application responds at root URL
✅ Database connections work
✅ No errors in logs
✅ All routes accessible

