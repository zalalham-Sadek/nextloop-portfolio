<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'name_en',
        'name_ar',
        'description',
        'description_en',
        'description_ar',
        'image',
        'link',
        'type',
        'type_en',
        'type_ar',
        'order',
    ];

    /**
     * Get the name based on current locale
     */
    public function getNameAttribute()
    {
        if (app()->getLocale() === 'ar' && $this->attributes['name_ar'] ?? null) {
            return $this->attributes['name_ar'];
        }
        return $this->attributes['name_en'] ?? $this->attributes['name'] ?? '';
    }

    /**
     * Get the description based on current locale
     */
    public function getDescriptionAttribute()
    {
        if (app()->getLocale() === 'ar' && $this->attributes['description_ar'] ?? null) {
            return $this->attributes['description_ar'];
        }
        return $this->attributes['description_en'] ?? $this->attributes['description'] ?? '';
    }

    /**
     * Get the type based on current locale
     */
    public function getTypeAttribute()
    {
        if (app()->getLocale() === 'ar' && $this->attributes['type_ar'] ?? null) {
            return $this->attributes['type_ar'];
        }
        return $this->attributes['type_en'] ?? $this->attributes['type'] ?? '';
    }
}
