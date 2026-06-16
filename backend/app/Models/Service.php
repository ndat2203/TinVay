<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Post;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'category_id',
        'parent_id',
        'title',
        'slug',
        'provider',
        'logo',
        'subtitle',
        'min_amount',
        'max_amount',
        'min_month',
        'max_month',
        'description',
        'guide_content',
        'content',
        'image',
        'background_image',
        'status',
    ];
    protected $casts = [
        'guide_content' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function faqs()
    {
        return $this->hasMany(ServiceFaq::class)
            ->orderBy('sort_order');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // service cha - con
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    // scope active
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
