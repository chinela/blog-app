<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $fillable = ['title', 'category_id', 'description', 'image', 'slug', 'user_id'];
    protected $appends = ['imagePath'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->slug = Str::slug($model->title);
        });
        static::updating(function ($model) {
            $model->slug = Str::slug($model->title);
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImagePathAttribute()
    {
        return asset(Storage::url($this->image));
    }
}
