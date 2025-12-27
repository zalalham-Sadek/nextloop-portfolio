#!/bin/bash

# Quick Deployment Script for NextLoop Portfolio
# Run this script on the server after uploading files

echo "🚀 Starting NextLoop Portfolio Deployment..."

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Check if .env exists
if [ ! -f .env ]; then
    echo -e "${RED}❌ Error: .env file not found!${NC}"
    echo "Please create .env file first."
    exit 1
fi

echo -e "${YELLOW}📦 Installing PHP dependencies...${NC}"
composer install --optimize-autoloader --no-dev

if [ $? -ne 0 ]; then
    echo -e "${RED}❌ Composer install failed!${NC}"
    exit 1
fi

echo -e "${GREEN}✅ PHP dependencies installed${NC}"

echo -e "${YELLOW}📦 Installing Node dependencies...${NC}"
npm install

if [ $? -ne 0 ]; then
    echo -e "${RED}❌ npm install failed!${NC}"
    exit 1
fi

echo -e "${GREEN}✅ Node dependencies installed${NC}"

echo -e "${YELLOW}🏗️ Building assets...${NC}"
npm run build

if [ $? -ne 0 ]; then
    echo -e "${RED}❌ Asset build failed!${NC}"
    exit 1
fi

echo -e "${GREEN}✅ Assets built successfully${NC}"

echo -e "${YELLOW}🔗 Creating storage link...${NC}"
php artisan storage:link

echo -e "${YELLOW}🗄️ Running migrations...${NC}"
php artisan migrate --force

if [ $? -ne 0 ]; then
    echo -e "${RED}❌ Migrations failed!${NC}"
    exit 1
fi

echo -e "${GREEN}✅ Migrations completed${NC}"

echo -e "${YELLOW}⚡ Optimizing application...${NC}"
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

echo -e "${GREEN}✅ Application optimized${NC}"

echo -e "${YELLOW}📝 Setting permissions...${NC}"
chmod -R 775 storage bootstrap/cache
chmod -R 755 storage bootstrap/cache

echo -e "${GREEN}✅ Permissions set${NC}"

echo -e "${GREEN}🎉 Deployment completed successfully!${NC}"
echo -e "${YELLOW}⚠️  Don't forget to:${NC}"
echo "  1. Set APP_DEBUG=false in .env"
echo "  2. Set APP_ENV=production in .env"
echo "  3. Verify APP_URL is correct in .env"
echo "  4. Test the website thoroughly"

