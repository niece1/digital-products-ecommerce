<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'session_id'
    ];

    /**
     * Scope a query to include cart session.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithSession()
    {
        return $this->where('session_id', session()->getId())->latest();
    }

    /**
     * Get articles associated with specified cart.
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class)->withTimestamps();
    }

    /**
     * Get total price of all articles in the cart.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function totalAmount()
    {
        return $this->articles->sum('price');
    }
}
