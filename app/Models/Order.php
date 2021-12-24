<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
    
    public function totalAmount()
    {
        return $this->articles->sum('price');
    }
}
