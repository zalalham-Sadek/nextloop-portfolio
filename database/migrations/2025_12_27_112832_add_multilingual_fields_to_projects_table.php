<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Add multilingual fields
            $table->string('name_en')->nullable()->after('name');
            $table->string('name_ar')->nullable()->after('name_en');
            $table->text('description_en')->nullable()->after('description');
            $table->text('description_ar')->nullable()->after('description_en');
            $table->string('type_en')->nullable()->after('type');
            $table->string('type_ar')->nullable()->after('type_en');
        });

        // Migrate existing data to English fields
        DB::statement('UPDATE projects SET name_en = name, description_en = description, type_en = type WHERE name_en IS NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['name_en', 'name_ar', 'description_en', 'description_ar', 'type_en', 'type_ar']);
        });
    }
};
