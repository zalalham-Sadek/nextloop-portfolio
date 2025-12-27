# دليل رفع الموقع للاستضافة - NextLoop Portfolio

## 📋 المتطلبات الأساسية

تأكد من أن الاستضافة تدعم:
- ✅ PHP 8.2 أو أحدث
- ✅ MySQL 5.7+ أو MariaDB 10.2+
- ✅ Composer
- ✅ Node.js و npm (لبناء assets)
- ✅ Apache أو Nginx
- ✅ mod_rewrite (لـ Apache)
- ✅ OpenSSL PHP Extension
- ✅ PDO PHP Extension
- ✅ Mbstring PHP Extension
- ✅ Tokenizer PHP Extension
- ✅ XML PHP Extension
- ✅ Ctype PHP Extension
- ✅ JSON PHP Extension

---

## 📦 الخطوة 1: إعداد الملفات محلياً

### 1.1 بناء Assets للإنتاج

```bash
npm run build
```

### 1.2 تحسين الكود

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 1.3 التأكد من ملف .env للإنتاج

يجب أن يحتوي ملف `.env` على:

```env
APP_NAME="NextLoop Portfolio"
APP_ENV=production
APP_KEY=base64:your-app-key-here
APP_DEBUG=false
APP_URL=https://yourdomain.com

LOG_CHANNEL=stack
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120
```

---

## 📤 الخطوة 2: رفع الملفات للاستضافة

### الملفات التي يجب رفعها:

✅ **يجب رفعها:**
- جميع ملفات `app/`
- جميع ملفات `bootstrap/`
- جميع ملفات `config/`
- جميع ملفات `database/` (migrations و seeders فقط)
- جميع ملفات `lang/`
- جميع ملفات `public/`
- جميع ملفات `resources/`
- جميع ملفات `routes/`
- `artisan`
- `composer.json`
- `composer.lock`
- `package.json`
- `package-lock.json`
- `vite.config.js`
- `.htaccess` (من public/)

❌ **لا ترفع:**
- `.env` (سأنشئه على السيرفر)
- `node_modules/`
- `vendor/` (سيتم تثبيته على السيرفر)
- `storage/logs/*.log`
- `.git/`
- `tests/`
- `.phpunit.result.cache`
- `.idea/`, `.vscode/`, إلخ

---

## 🔧 الخطوة 3: الإعداد على السيرفر

### 3.1 الاتصال بالسيرفر

استخدم FTP/SFTP أو SSH للاتصال بالسيرفر.

### 3.2 رفع الملفات

ارفع جميع الملفات المطلوبة إلى مجلد الاستضافة (عادة `public_html` أو `www` أو `htdocs`).

**ملاحظة مهمة:** محتوى مجلد `public/` يجب أن يكون في المجلد الرئيسي (public_html)، وملفات المشروع الأخرى في مجلد أعلى.

**الهيكل الموصى به:**
```
/home/username/
├── public_html/          (محتوى مجلد public/)
│   ├── index.php
│   ├── .htaccess
│   ├── assets/
│   └── ...
├── nextloop-portfolio/   (باقي الملفات)
│   ├── app/
│   ├── bootstrap/
│   ├── config/
│   ├── ...
│   └── public/          (رابط symbolic إلى public_html)
```

أو إذا كانت الاستضافة تسمح بذلك:
```
/home/username/public_html/
├── app/
├── bootstrap/
├── config/
├── public/
│   ├── index.php
│   └── .htaccess
└── ...
```

### 3.3 إنشاء ملف .env

على السيرفر، قم بإنشاء ملف `.env` في المجلد الرئيسي للمشروع:

```bash
cd /path/to/your/project
nano .env
```

انسخ محتوى ملف `.env` المحلي وقم بتعديل القيم حسب السيرفر.

### 3.4 تثبيت Dependencies

```bash
# تثبيت PHP dependencies
composer install --optimize-autoloader --no-dev

# تثبيت Node dependencies
npm install

# بناء assets
npm run build
```

### 3.5 إنشاء symbolic link للـ storage

```bash
php artisan storage:link
```

### 3.6 تشغيل Migrations

```bash
php artisan migrate --force
```

### 3.7 تنظيف وبناء Cache

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

---

## 🔐 الخطوة 4: إعدادات الأمان

### 4.1 صلاحيات الملفات

```bash
# صلاحيات المجلدات
chmod -R 755 storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# صلاحيات الملفات
find storage -type f -exec chmod 664 {} \;
find bootstrap/cache -type f -exec chmod 664 {} \;
```

### 4.2 إخفاء ملف .env

تأكد من أن `.env` غير قابل للوصول من المتصفح.

### 4.3 إعداد APP_DEBUG=false

في ملف `.env`:
```env
APP_DEBUG=false
APP_ENV=production
```

---

## 🌐 الخطوة 5: إعداد Apache (.htaccess)

إذا كان المجلد الرئيسي هو `public_html`، يجب إنشاء ملف `.htaccess` في الجذر:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

وتأكد من وجود ملف `.htaccess` في مجلد `public/`:

```apache
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

---

## 🗄️ الخطوة 6: إعداد قاعدة البيانات

### 6.1 إنشاء قاعدة البيانات

في cPanel أو phpMyAdmin، أنشئ قاعدة بيانات جديدة:
- Database Name: `nextloop_portfolio`
- Collation: `utf8mb4_unicode_ci`

### 6.2 إنشاء مستخدم قاعدة البيانات

أنشئ مستخدم جديد وأعطه صلاحيات كاملة على قاعدة البيانات.

### 6.3 تحديث ملف .env

```env
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### 6.4 تشغيل Migrations

```bash
php artisan migrate --force
```

---

## ✅ الخطوة 7: التحقق

### 7.1 اختبار الموقع

افتح المتصفح واذهب إلى `https://yourdomain.com` وتحقق من:
- ✅ الصفحة الرئيسية تظهر بشكل صحيح
- ✅ الصور تظهر
- ✅ CSS و JavaScript يعملان
- ✅ الروابط تعمل
- ✅ تغيير اللغة يعمل

### 7.2 اختبار لوحة التحكم

اذهب إلى `https://yourdomain.com/admin/dashboard` وتحقق من:
- ✅ تسجيل الدخول يعمل (إذا كان موجوداً)
- ✅ عرض المشاريع
- ✅ عرض الخدمات
- ✅ إضافة/تعديل/حذف يعمل

---

## 🔧 حل المشاكل الشائعة

### خطأ 500 Internal Server Error

```bash
# تحقق من logs
tail -f storage/logs/laravel.log

# تنظيف cache
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
```

### الصور لا تظهر

```bash
# إعادة إنشاء symbolic link
php artisan storage:link

# التحقق من الصلاحيات
chmod -R 775 storage/app/public
```

### CSS/JS لا يعمل

```bash
# إعادة بناء assets
npm run build

# التحقق من أن ملفات build موجودة في public/build/
```

### مشكلة في Routes

```bash
# تنظيف route cache
php artisan route:clear
php artisan route:cache
```

---

## 📝 قائمة التحقق النهائية

- [ ] رفع جميع الملفات المطلوبة
- [ ] إنشاء ملف `.env` على السيرفر
- [ ] تحديث إعدادات قاعدة البيانات في `.env`
- [ ] تشغيل `composer install --no-dev`
- [ ] تشغيل `npm install && npm run build`
- [ ] تشغيل `php artisan storage:link`
- [ ] تشغيل `php artisan migrate --force`
- [ ] تشغيل `php artisan config:cache`
- [ ] تشغيل `php artisan route:cache`
- [ ] تشغيل `php artisan view:cache`
- [ ] تعيين `APP_DEBUG=false` في `.env`
- [ ] التحقق من صلاحيات المجلدات
- [ ] اختبار الموقع بشكل كامل

---

## 📞 الدعم

إذا واجهت أي مشاكل، تحقق من:
- Laravel Logs: `storage/logs/laravel.log`
- Server Error Logs (عادة في cPanel)
- PHP Error Logs

**ملاحظة:** تأكد من أن PHP version على السيرفر هو 8.2 أو أحدث!

