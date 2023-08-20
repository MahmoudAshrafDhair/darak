<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_Us extends Model
{
    use HasFactory;
    protected $table = "contact__us";
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
    ];

    public $timestamps = true;

    //////////////////////////////////////// HTML Datatable //////////////////////////////////////

    public function getActionButtonsAttribute()
    {
        $button = '';

//        $button .= '<a href="' . route('admin.cities.edit', $this->id) . '" class="btn btn-icon btn-xs btn-info"><i class="flaticon2-edit"></i></a>';
        $button .= '<a href="' . route('admin.contacts.show', $this->id) . '" class="btn btn-icon btn-xs btn-info"><i class="flaticon-eye"></i></a>';

        $button .= '&nbsp;&nbsp;<button  title="Delete City" type="button" data-id="' . $this->id . '"  data-toggle="modal" data-target="#deleteModel" class="btn btn-icon btn-xs btn-danger delete-item"><i class="flaticon2-trash"></i></button>';

        return $button;
    }
}
