<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePost extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'order'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function scopeSortAsc($query)
    {
        return $query->orderBy(array(
            'order' => 'asc'
        ));
    }

    public function scopeSortDesc($query)
    {
        return $query->orderByDesc(array(
            'order' => 'desc'
        ));
    }

    public function getIdsAttribute()
    {
        return HomePost::all()->pluck('post_id')->toArray();
    }
}
