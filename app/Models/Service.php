<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name_en',
        'name_ar',
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'icon',
        'type',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Get the name based on current locale
     */
    public function getNameAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->name_ar : $this->name_en;
    }

    /**
     * Get the title based on current locale
     */
    public function getTitleAttribute()
    {
        $title = app()->getLocale() === 'ar' ? $this->title_ar : $this->title_en;
        return $title ?: $this->name; // Fallback to name if title is not set
    }

    /**
     * Get the description based on current locale
     */
    public function getDescriptionAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->description_ar : $this->description_en;
    }

    /**
     * Scope to get only active services
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to get services by type
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Scope to order services
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
