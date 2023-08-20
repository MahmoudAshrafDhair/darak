<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class WelcomePage extends Model
{
    use HasFactory , HasTranslations;
    protected $table = "welcome_pages";
    protected $fillable = [
        'image',
        'title',
        'description',
    ];

    public $translatable = ['description','title'];
    public $timestamps = true;

    //////////////////////////////////////// HTML Datatable //////////////////////////////////////

    public function getActionButtonsAttribute()
    {
        $button = '';

        $button .= '<a href="' . route('admin.welcomes.edit', $this->id) . '" class="btn btn-icon btn-xs btn-info"><i class="flaticon2-edit"></i></a>';

        $button .= '&nbsp;&nbsp;<button  title="Delete Welcome Page" type="button" data-id="' . $this->id . '"  data-toggle="modal" data-target="#deleteModel" class="btn btn-icon btn-xs btn-danger delete-item"><i class="flaticon2-trash"></i></button>';

        return $button;
    }
}
