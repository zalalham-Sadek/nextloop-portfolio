# حل مشكلة عدم ظهور الصور على السيرفر

## ✅ الخطوات المطلوبة على السيرفر:

### 1. إنشاء Symbolic Link (الأهم!)

اتصل بالسيرفر عبر SSH أو استخدم Terminal في cPanel:

```bash
cd /path/to/your/project
php artisan storage:link
```

إذا فشل، جرب:

```bash
php artisan storage:link --force
```

### 2. التحقق من وجود المجلدات

تأكد من وجود المجلدات:
```bash
mkdir -p storage/app/public/projects
chmod -R 775 storage/app/public
```

### 3. التحقق من الصلاحيات

```bash
chmod -R 775 storage/app/public
chmod -R 775 public
```

### 4. التحقق من الرابط الرمزي

```bash
ls -la public/storage
```

يجب أن ترى:
```
storage -> ../storage/app/public
```

---

## 🔍 التحقق من المشكلة:

### في المتصفح (F12 > Network):

1. افتح Developer Tools (F12)
2. اذهب إلى Network tab
3. أعد تحميل الصفحة
4. ابحث عن طلبات الصور
5. تحقق من:
   - **✅ صحيح:** `yourdomain.com/storage/projects/xxx.jpg` → Status 200
   - **❌ خطأ:** `yourdomain.com/storage/projects/xxx.jpg` → Status 404

---

## 🛠️ الحل البديل (إذا لم يعمل Symbolic Link):

### في cPanel File Manager:

1. اذهب إلى `public/`
2. احذف مجلد `storage` إذا كان موجوداً (كملف عادي)
3. أنشئ **Symlink** جديد:
   - اضغط "Create Symbolic Link"
   - Name: `storage`
   - Target: `../storage/app/public`

---

## 📝 ملاحظات مهمة:

- ✅ تم تحديث الكود لاستخدام `Storage::disk('public')->url()` كبديل تلقائي
- ✅ الكود الآن يتحقق من وجود الملف قبل عرضه
- ✅ في حالة فشل التحميل، سيظهر placeholder بدلاً من خطأ

---

## ⚠️ إذا استمرت المشكلة:

1. **تحقق من وجود الملف:**
   ```bash
   ls -la storage/app/public/projects/
   ```

2. **تحقق من الصلاحيات:**
   ```bash
   chown -R www-data:www-data storage/app/public
   chmod -R 775 storage/app/public
   ```

3. **تحقق من إعدادات `.env`:**
   ```env
   APP_URL=https://yourdomain.com
   ```

4. **امسح Cache:**
   ```bash
   php artisan cache:clear
   php artisan config:clear
   php artisan view:clear
   ```

---

## 🎯 الحل السريع (إذا لم يكن لديك SSH):

في phpMyAdmin أو أي أداة قاعدة بيانات، تحقق من قيمة `image` في جدول `projects`:
- يجب أن تكون مثل: `projects/xxx.jpg`
- **لا يجب** أن تبدأ بـ `/` أو `storage/`


