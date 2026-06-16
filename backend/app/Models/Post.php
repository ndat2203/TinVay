<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\Category;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'category_id',
        'service_id',
        'title',
        'slug',
        'description',
        'content',
        'image',
        'status',
    ];

    protected $casts = [
        'status' => 'integer',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
