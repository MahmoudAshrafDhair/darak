<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class RealEstate extends Model
{
    use HasFactory , HasTranslations;
    protected $table = "real_estates";
    protected $fillable = [
        'main_image',
        'name',
        'type',
        'living_num',
        'rooms_num',
        'bathroom_num',
        'space',
        'age',
        'description',
        'price',
        'longitude',
        'latitude',
        'address',
        'phone',
        'user_id',
        'category_id',
        'city_id',
        'region_id',
    ];

    public $translatable = ['name','description'];
    public $timestamps = true;

    ////////////////////////////////////////// Relationship ///////////////////////////

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function city(){
        return $this->belongsTo(City::class,'city_id','id');
    }

    public function region(){
        return $this->belongsTo(Region::class,'region_id','id');
    }

    //////////////////////////////////////// HTML Datatable //////////////////////////////////////

    public function getActionButtonsAttribute()
    {
        $button = '';

//        $button .= '<a href="' . route('admin.reals.edit', $this->id) . '" class="btn btn-icon btn-xs btn-info"><i class="flaticon2-edit"></i></a>';

        $button .= '<button  title="Delete Reals" type="button" data-id="' . $this->id . '"  data-toggle="modal" data-target="#deleteModel" class="btn btn-icon btn-xs btn-danger delete-item"><i class="flaticon2-trash"></i></button>';

        return $button;
    }
}
