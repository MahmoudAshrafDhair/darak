<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $table = "favorites";
    protected $fillable = [
        'user_id',
        'real_estate_id',
    ];

    public $timestamps = true;
}
