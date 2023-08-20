<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasFactory , HasTranslations;
    protected $table = "settings";
    protected $fillable = [
        'about_us',
        'terms_and_conditions',
        'privacy_police',
    ];

    public $translatable = ['about_us','terms_and_conditions','privacy_police'];
    public $timestamps = true;
}
