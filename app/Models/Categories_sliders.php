<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories_sliders extends Model
{
    protected $fillable = ['name'];
    public function sliders(){
        return $this->hasMany(Sliders::class, 'categories_sliders_id');
    }
    use HasFactory;
}
