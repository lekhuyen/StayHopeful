<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutusmember extends Model
{
    protected $fillable = ['title', 'description', 'section', 'lefttitle', 'leftdescription', 'middletitle', 'middledescription', 'righttitle', 'rightdescription', 'video'];

    public function images()
    {
        return $this->hasMany(aboutusmemberimage::class, 'aboutus_id');
    }
    use HasFactory;
}
