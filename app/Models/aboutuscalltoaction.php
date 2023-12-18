<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutuscalltoaction extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'section', 'lefttitle', 'leftdescription', 'middletitle', 'middledescription', 'righttitle', 'rightdescription'];

    public function images()
    {
        return $this->hasMany(Aboutusimage::class, 'aboutus_id');
    }
}