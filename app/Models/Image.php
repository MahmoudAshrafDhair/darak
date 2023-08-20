<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = "images";
    protected $fillable = [
        'image',
        'real_estate_id'
    ];


    public $timestamps = true;
}
