<?php

// app\Models\Aboutusimage.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutusimage extends Model
{
    protected $fillable = ["url_image", "aboutus_id"];

    protected $table = 'aboutus_images';

    public function team()
    {
        return $this->belongsTo(Aboutusteam::class, 'aboutus_id');
    }

    use HasFactory;
}