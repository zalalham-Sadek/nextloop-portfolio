# دليل تحويل قاعدة البيانات من SQLite إلى MySQL

## الخطوات المطلوبة:

### 1. إنشاء قاعدة بيانات MySQL

افتح MySQL Command Line أو phpMyAdmin وأنشئ قاعدة بيانات جديدة:

```sql
CREATE DATABASE nextloop_portfolio CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 2. تحديث ملف .env

افتح ملف `.env` في مجلد المشروع وقم بتحديث الإعدادات التالية:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nextloop_portfolio
DB_USERNAME=root
DB_PASSWORD=your_mysql_password
```

**ملاحظات:**
- استبدل `nextloop_portfolio` باسم قاعدة البيانات الذي أنشأته
- استبدل `root` بـ username MySQL الخاص بك
- استبدل `your_mysql_password` بـ كلمة مرور MySQL الخاصة بك

### 3. تشغيل Migrations

بعد تحديث ملف .env، قم بتشغيل الأوامر التالية:

```bash
php artisan migrate:fresh
```

أو إذا كنت تريد الاحتفاظ بالبيانات الموجودة (من SQLite):

```bash
php artisan migrate
```

### 4. تشغيل Seeders (اختياري)

إذا كان لديك seeders، قم بتشغيلها:

```bash
php artisan db:seed
```

### 5. التحقق من الاتصال

تحقق من أن الاتصال يعمل بشكل صحيح:

```bash
php artisan tinker
```

ثم في Tinker:
```php
DB::connection()->getPdo();
```

إذا ظهرت معلومات PDO بدون أخطاء، فإن الاتصال نجح.

## ملاحظات مهمة:

1. **نسخ احتياطي**: قبل التحويل، تأكد من عمل نسخة احتياطية من قاعدة بيانات SQLite (database/database.sqlite)

2. **Migration التلقائي**: تم تحديث ملف `config/database.php` لاستخدام MySQL كإعداد افتراضي

3. **البيانات الموجودة**: إذا كان لديك بيانات في SQLite وتريد نقلها، ستحتاج إلى استخدام أداة migration أو استيراد البيانات يدوياً

4. **إعدادات MySQL**: تأكد من أن MySQL service يعمل قبل تشغيل migrations

