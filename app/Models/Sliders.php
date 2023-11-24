<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    protected $fillable = ['url_image', 'slider_name','categories_sliders_id'];
    public function categories_sliders(){
        return $this->belongsTo(Categories_sliders::class,'categories_sliders_id');
    }
    use HasFactory;
}
