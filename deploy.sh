#!/bin/bash

# Laravel Deployment Script
# Usage: ./deploy.sh [platform]
# Platforms: railway, heroku, production, local

set -e

PLATFORM=${1:-production}
ENV_FILE=".env"

echo "🚀 Starting deployment for platform: $PLATFORM"

# Colors for output
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # No Color

# Function to print colored output
print_success() {
    echo -e "${GREEN}✅ $1${NC}"
}

print_warning() {
    echo -e "${YELLOW}⚠️  $1${NC}"
}

print_error() {
    echo -e "${RED}❌ $1${NC}"
}

# Check if .env file exists
if [ ! -f "$ENV_FILE" ]; then
    print_warning ".env file not found. Creating from .env.example..."
    if [ -f ".env.example" ]; then
        cp .env.example .env
        print_success ".env file created"
    else
        print_error ".env.example not found. Please create .env file manually."
        exit 1
    fi
fi

# Install PHP dependencies
echo ""
print_success "Installing PHP dependencies..."
if [ "$PLATFORM" = "production" ] || [ "$PLATFORM" = "railway" ] || [ "$PLATFORM" = "heroku" ]; then
    composer install --no-dev --optimize-autoloader --no-interaction
else
    composer install --no-interaction
fi

# Install NPM dependencies
echo ""
print_success "Installing NPM dependencies..."
npm ci

# Build assets
echo ""
print_success "Building assets..."
npm run build

# Generate app key if not exists
echo ""
if ! grep -q "APP_KEY=base64:" "$ENV_FILE"; then
    print_warning "APP_KEY not found. Generating..."
    php artisan key:generate --force
    print_success "APP_KEY generated"
else
    print_success "APP_KEY already exists"
fi

# Clear all caches
echo ""
print_success "Clearing caches..."
php artisan optimize:clear

# Run migrations
echo ""
read -p "Run database migrations? (y/n) " -n 1 -r
echo
if [[ $REPLY =~ ^[Yy]$ ]]; then
    print_success "Running migrations..."
    if [ "$PLATFORM" = "production" ] || [ "$PLATFORM" = "railway" ] || [ "$PLATFORM" = "heroku" ]; then
        php artisan migrate --force
    else
        php artisan migrate
    fi
fi

# Cache configuration
echo ""
print_success "Caching configuration..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Create storage symlink
echo ""
print_success "Creating storage symlink..."
if [ ! -L "public/storage" ]; then
    php artisan storage:link
    print_success "Storage symlink created"
else
    print_success "Storage symlink already exists"
fi

# Optimize
echo ""
print_success "Optimizing application..."
php artisan optimize

# Platform-specific tasks
case $PLATFORM in
    railway)
        echo ""
        print_success "Railway-specific tasks completed"
        print_warning "Make sure to set environment variables in Railway dashboard"
        ;;
    heroku)
        echo ""
        print_success "Heroku-specific tasks completed"
        print_warning "Make sure to set environment variables: heroku config:set KEY=value"
        ;;
    production)
        echo ""
        print_success "Production deployment completed"
        print_warning "Remember to:"
        echo "  - Set APP_ENV=production"
        echo "  - Set APP_DEBUG=false"
        echo "  - Set correct file permissions: chmod -R 755 storage bootstrap/cache"
        ;;
    *)
        echo ""
        print_success "Deployment completed"
        ;;
esac

echo ""
print_success "🎉 Deployment script completed successfully!"

