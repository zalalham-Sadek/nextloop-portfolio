@echo off
REM Quick Deployment Script for NextLoop Portfolio (Windows Server)
REM Run this script on the server after uploading files

echo.
echo ========================================
echo  NextLoop Portfolio Deployment
echo ========================================
echo.

REM Check if .env exists
if not exist .env (
    echo [ERROR] .env file not found!
    echo Please create .env file first.
    pause
    exit /b 1
)

echo [1/7] Installing PHP dependencies...
call composer install --optimize-autoloader --no-dev
if errorlevel 1 (
    echo [ERROR] Composer install failed!
    pause
    exit /b 1
)
echo [OK] PHP dependencies installed
echo.

echo [2/7] Installing Node dependencies...
call npm install
if errorlevel 1 (
    echo [ERROR] npm install failed!
    pause
    exit /b 1
)
echo [OK] Node dependencies installed
echo.

echo [3/7] Building assets...
call npm run build
if errorlevel 1 (
    echo [ERROR] Asset build failed!
    pause
    exit /b 1
)
echo [OK] Assets built successfully
echo.

echo [4/7] Creating storage link...
call php artisan storage:link
echo [OK] Storage link created
echo.

echo [5/7] Running migrations...
call php artisan migrate --force
if errorlevel 1 (
    echo [ERROR] Migrations failed!
    pause
    exit /b 1
)
echo [OK] Migrations completed
echo.

echo [6/7] Optimizing application...
call php artisan config:cache
call php artisan route:cache
call php artisan view:cache
call php artisan optimize
echo [OK] Application optimized
echo.

echo [7/7] Deployment completed!
echo.
echo ========================================
echo  IMPORTANT REMINDERS:
echo ========================================
echo 1. Set APP_DEBUG=false in .env
echo 2. Set APP_ENV=production in .env
echo 3. Verify APP_URL is correct in .env
echo 4. Test the website thoroughly
echo ========================================
echo.
pause

