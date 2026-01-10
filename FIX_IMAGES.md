# إصلاح مشكلة عدم ظهور الصور

## المشكلة
الصور لا تظهر في الموقع.

## الحلول المحتملة:

### ✅ الحل 1: إنشاء Symbolic Link (الأكثر شيوعاً)

الصور محفوظة في `storage/app/public/projects/` لكن يحتاج Laravel لربطها مع `public/storage/`.

#### على السيرفر:

```bash
php artisan storage:link
```

إذا فشل الأمر، جرب:

```bash
cd /path/to/your/project
php artisan storage:link --force
```

#### أو يدوياً في cPanel File Manager:

1. اذهب إلى `public/`
2. أنشئ رابط رمزي (symlink) اسمه `storage`
3. اربطه بـ `../storage/app/public`

---

### ✅ الحل 2: التحقق من الصلاحيات

```bash
chmod -R 775 storage/app/public
chmod -R 775 public/storage
```

---

### ✅ الحل 3: التحقق من المسار

تأكد من أن الصور موجودة في:
```
storage/app/public/projects/
```

وأن الرابط الرمزي موجود في:
```
public/storage -> ../storage/app/public
```

---

### ✅ الحل 4: استخدام Storage::url بدلاً من asset

إذا لم يعمل symbolic link، يمكن تغيير الكود لاستخدام:

```php
{{ Storage::disk('public')->url($project->image) }}
```

لكن هذا يتطلب إعدادات إضافية في `config/filesystems.php`.

---

## كيفية التحقق:

1. افتح المتصفح
2. اضغط F12 (Developer Tools)
3. اذهب إلى Network tab
4. ابحث عن طلبات الصور
5. تحقق من المسار:
   - ✅ يجب أن يكون: `yourdomain.com/storage/projects/xxx.jpg`
   - ❌ خطأ: `yourdomain.com/storage/app/public/projects/xxx.jpg`

---

## إذا استمرت المشكلة:

1. **تحقق من وجود الملفات:**
   ```bash
   ls -la storage/app/public/projects/
   ```

2. **تحقق من symbolic link:**
   ```bash
   ls -la public/storage
   ```
   يجب أن يظهر كـ: `storage -> ../storage/app/public`

3. **تحقق من الصلاحيات:**
   ```bash
   chmod -R 775 storage/app/public
   chown -R www-data:www-data storage/app/public
   ```

---

## ملاحظات:

- بعد إنشاء symbolic link، قد تحتاج إلى مسح cache:
  ```bash
  php artisan cache:clear
  php artisan config:clear
  php artisan view:clear
  ```

- في بعض الاستضافات المشتركة، قد تحتاج لطلب من الدعم الفني إنشاء symbolic link



