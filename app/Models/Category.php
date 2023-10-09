<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'is_published',
        'user_id',
    ];

    function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeUnpublished($query)
    {
        return $query->where('is_published', false);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%");
    }

    public function scopeSort($query, $sort)
    {
        return $query->orderBy($sort);
    }

    public function scopeSortDesc($query, $sort)
    {
        return $query->orderByDesc($sort);
    }

    public function scopeSortBy($query, $sort, $order)
    {
        return $query->orderBy($sort, $order);
    }

    public function scopeSortByDesc($query, $sort, $order)
    {
        return $query->orderByDesc($sort, $order);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
}
