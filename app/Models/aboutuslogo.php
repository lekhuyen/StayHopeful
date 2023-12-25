<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutuslogo extends Model
{
    protected $fillable = ['title'];

    public function images()
    {
        return $this->hasMany(aboutuslogoimage::class, 'aboutus_id');
    }

    use HasFactory;
}
