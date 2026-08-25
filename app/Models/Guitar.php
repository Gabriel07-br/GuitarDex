<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guitar extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'brand',
        'model',
        'year',
        'color',
        'description',
        'image'
    ];

    //uma guitarra pertence a um usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
