<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Make old fields nullable since we're using multilingual fields now
            $table->string('name')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->string('type')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Revert back to required (if needed)
            $table->string('name')->nullable(false)->change();
            $table->text('description')->nullable(false)->change();
            $table->string('type')->nullable()->change(); // type was already nullable
        });
    }
};
