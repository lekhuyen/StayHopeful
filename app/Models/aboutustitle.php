<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutustitle extends Model
{
    protected $fillable = ['title', 'description', 'section'];

    public function images()
    {
        return $this->hasMany(aboutustitleimage::class, 'aboutus_id');
    }

    use HasFactory;
}
