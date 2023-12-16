<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aboutuspage extends Model
{
    protected $fillable = ['title', 'description', 'section'];

    public function images(){
        return $this->hasMany(aboutusimage::class, "aboutus_id");
    }
    use HasFactory;
}
