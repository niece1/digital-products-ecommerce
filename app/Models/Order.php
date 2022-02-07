<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Get articles associated with specified order.
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    /**
     * Get total price of all articles in the order.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function totalAmount()
    {
        return $this->articles->sum('price');
    }
}
