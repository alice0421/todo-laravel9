<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // TODO: リレーション
    use HasFactory;

    public function tasks()
    {
        return $this->hasMany(Category::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}