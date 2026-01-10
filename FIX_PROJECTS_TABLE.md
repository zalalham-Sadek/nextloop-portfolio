# إصلاح جدول Projects على الاستضافة

## الطريقة 1: استخدام Migration (موصى بها)

### الخطوات:

1. **ارفع ملف Migration للسيرفر:**
   - ارفع ملف: `database/migrations/2025_12_29_173623_modify_projects_table_make_old_fields_nullable.php`

2. **اتصل بالسيرفر عبر SSH** (إذا كان متاحاً):
   ```bash
   ssh username@your-server.com
   cd /path/to/your/project
   php artisan migrate
   ```

3. **أو استخدم Terminal في cPanel:**
   - اذهب إلى Terminal في cPanel
   - انتقل إلى مجلد المشروع
   - شغّل: `php artisan migrate`

---

## الطريقة 2: تعديل الجدول يدوياً (SQL مباشر)

### في phpMyAdmin:

1. افتح **phpMyAdmin** من cPanel
2. اختر قاعدة البيانات الخاصة بك
3. اضغط على **SQL** في القائمة العلوية
4. انسخ والصق الكود التالي:

```sql
ALTER TABLE `projects` 
MODIFY COLUMN `name` VARCHAR(255) NULL,
MODIFY COLUMN `description` TEXT NULL,
MODIFY COLUMN `type` VARCHAR(255) NULL;
```

5. اضغط **Go** أو **تنفيذ**

---

## الطريقة 3: استخدام SQL في Terminal

إذا كان لديك وصول SSH:

```bash
mysql -u your_username -p your_database_name

# ثم في MySQL:
ALTER TABLE `projects` 
MODIFY COLUMN `name` VARCHAR(255) NULL,
MODIFY COLUMN `description` TEXT NULL,
MODIFY COLUMN `type` VARCHAR(255) NULL;

# للخروج:
exit;
```

---

## التحقق من نجاح التعديل

بعد تنفيذ أي من الطرق أعلاه، تحقق من:

1. افتح phpMyAdmin
2. اختر جدول `projects`
3. اضغط على **Structure**
4. تأكد من أن الحقول `name`, `description`, `type` تحتوي على **Null: YES**

---

## ملاحظات مهمة:

- ⚠️ **احتياطي:** قم بعمل نسخة احتياطية من قاعدة البيانات قبل التعديل
- ✅ بعد التعديل، يمكنك إضافة المشاريع بدون أخطاء
- ✅ الحقول القديمة ستكون nullable، والحقول الجديدة (name_en, name_ar, etc.) هي التي تستخدم

---

## إذا واجهت مشكلة:

إذا ظهر خطأ مثل: `#1062 - Duplicate entry` أو أي خطأ آخر:
- تأكد من أن الجدول موجود
- تأكد من أسماء الأعمدة صحيحة
- تحقق من صلاحيات قاعدة البيانات



