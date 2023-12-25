<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutusmemberimage extends Model
{
    protected $fillable = ["url_image", "aboutus_id"];

    public function callto()
    {
        return $this->belongsTo(aboutusmember::class, 'aboutus_id');
    }

    use HasFactory;
}
