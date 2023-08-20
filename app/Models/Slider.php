<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = "sliders";
    protected $fillable = [
        'image',
        'real_estate_id',
    ];

    public $timestamps = true;

    ///////////////////////////////////////////// Relationship ///////////////////

    public function real(){
        return $this->belongsTo(RealEstate::class,'real_estate_id','id');
    }

    //////////////////////////////////////// HTML Datatable //////////////////////////////////////

    public function getActionButtonsAttribute()
    {
        $button = '';

        $button .= '<a href="' . route('admin.sliders.edit', $this->id) . '" class="btn btn-icon btn-xs btn-info"><i class="flaticon2-edit"></i></a>';

        $button .= '&nbsp;&nbsp;<button  title="Delete Slider" type="button" data-id="' . $this->id . '"  data-toggle="modal" data-target="#deleteModel" class="btn btn-icon btn-xs btn-danger delete-item"><i class="flaticon2-trash"></i></button>';

        return $button;
    }
}
