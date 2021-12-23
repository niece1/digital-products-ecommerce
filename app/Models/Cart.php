<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'session_id'
    ];
    
    public function articles()
    {
        return $this->belongsToMany(Article::class)
            ->withTimestamps();
    }
}
