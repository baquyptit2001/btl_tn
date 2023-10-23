<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'is_published',
        'category_id',
        'image',
        'user_id',
    ];

    function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
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
        return $query->where('title', 'like', "%{$search}%")
            ->orWhere('content', 'like', "%{$search}%");
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

    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }

    public function scopeFilterBy($query, $filters, $filter)
    {
        return $filters->apply($query, $filter);
    }

    public function scopeFilterByDesc($query, $filters, $filter)
    {
        return $filters->applyDesc($query, $filter);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }

    public function getReleaseDateAttribute()
    {
        return $this->created_at->format('F. j, Y');
    }
}
