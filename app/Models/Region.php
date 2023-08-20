<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Region extends Model
{
    use HasFactory , HasTranslations;
    protected $table = "regions";
    protected $fillable = [
        'name',
    ];

    public $translatable = ['name'];
    public $timestamps = true;

    //////////////////////////////////////// HTML Datatable //////////////////////////////////////

    public function getActionButtonsAttribute()
    {
        $button = '';

        $button .= '<a href="' . route('admin.regions.edit', $this->id) . '" class="btn btn-icon btn-xs btn-info"><i class="flaticon2-edit"></i></a>';

        $button .= '&nbsp;&nbsp;<button  title="Delete Region" type="button" data-id="' . $this->id . '"  data-toggle="modal" data-target="#deleteModel" class="btn btn-icon btn-xs btn-danger delete-item"><i class="flaticon2-trash"></i></button>';

        return $button;
    }
}
