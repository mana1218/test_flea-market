<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'condition_id',
        'picture',
        'name',
        'brand',
        'price',
        'explain',
        'sold'
    ];

    protected $casts = [
        'sold' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function nices()
    {
        return $this->hasMany(Nice::class);
    }

    public function isNicedByAuthUser()
    {
        return $this->nices()->where('user_id', auth()->id())->exists();
    }

    public function purchase()
    {
        return $this->hasOne(Purchase::class);
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }

        return $query;
    }
}
