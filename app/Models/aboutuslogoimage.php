<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutuslogoimage extends Model
{
    protected $fillable = ["url_image", "aboutus_id"];

    public function images()
    {
        return $this->hasMany(aboutuslogo::class, 'aboutus_id');
    }
    use HasFactory;
}
