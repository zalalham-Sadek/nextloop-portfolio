# 🚀 دليل رفع الموقع للاستضافة - NextLoop Portfolio

## ⚡ الخطوات السريعة

### 1️⃣ على جهازك المحلي (قبل الرفع):

```bash
# بناء Assets
npm run build
```

### 2️⃣ رفع الملفات للاستضافة:

ارفع جميع الملفات **ما عدا**:
- ❌ `.env` (سأنشئه على السيرفر)
- ❌ `node_modules/`
- ❌ `vendor/`
- ❌ `.git/`

### 3️⃣ على السيرفر (بعد الرفع):

#### الطريقة الأولى: استخدام السكريبت التلقائي (موصى به)

**للسيرفرات Linux/Mac:**
```bash
chmod +x QUICK_DEPLOY.sh
./QUICK_DEPLOY.sh
```

**للسيرفرات Windows:**
```cmd
QUICK_DEPLOY.bat
```

#### الطريقة الثانية: الأوامر اليدوية

```bash
# 1. إنشاء ملف .env وتعديله
nano .env

# 2. تثبيت المكتبات
composer install --optimize-autoloader --no-dev
npm install
npm run build

# 3. إعداد Laravel
php artisan storage:link
php artisan migrate --force

# 4. تحسين الأداء
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

# 5. الصلاحيات
chmod -R 775 storage bootstrap/cache
```

---

## 📝 إعدادات ملف .env على السيرفر

```env
APP_NAME="NextLoop Portfolio"
APP_ENV=production
APP_KEY=base64:YOUR-APP-KEY-HERE
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

**ملاحظة مهمة:** 
- تأكد من تعيين `APP_DEBUG=false` و `APP_ENV=production`
- قم بتغيير `APP_URL` إلى رابط موقعك الفعلي
- إذا لم يكن لديك `APP_KEY`، قم بتشغيل: `php artisan key:generate`

---

## 🗄️ إعداد قاعدة البيانات

1. أنشئ قاعدة بيانات MySQL من cPanel أو phpMyAdmin
2. أنشئ مستخدم قاعدة بيانات
3. حدّث ملف `.env` بإعدادات قاعدة البيانات
4. شغّل: `php artisan migrate --force`

---

## 📁 هيكل المجلدات على السيرفر

### الخيار الأول (موصى به):
```
/home/username/
├── public_html/          ← محتوى مجلد public/
│   ├── index.php
│   ├── .htaccess
│   └── ...
└── nextloop-portfolio/   ← باقي الملفات
    ├── app/
    ├── config/
    ├── .env
    └── ...
```

ثم عدّل `public/index.php` لتشير إلى المسار الصحيح.

### الخيار الثاني:
```
/home/username/public_html/
├── app/
├── config/
├── public/
│   ├── index.php
│   └── .htaccess
└── .env
```

---

## ✅ التحقق من نجاح الرفع

1. افتح الموقع في المتصفح
2. تأكد من ظهور الصفحة الرئيسية
3. اختبر تغيير اللغة
4. اختبر لوحة التحكم (`/admin/dashboard`)
5. اختبر إضافة/تعديل المشاريع والخدمات

---

## 🔧 حل المشاكل الشائعة

### خطأ 500:
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

### الصور لا تظهر:
```bash
php artisan storage:link
chmod -R 775 storage/app/public
```

### CSS/JS لا يعمل:
```bash
npm run build
```

---

## 📞 للتفاصيل الكاملة

راجع ملف `DEPLOYMENT_GUIDE.md` للحصول على دليل شامل ومفصل.

---

**تم التحديث:** ديسمبر 2025





