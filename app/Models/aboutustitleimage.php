<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutustitleimage extends Model
{
    protected $fillable = ["url_image", "aboutus_id"];

    public function aboutustitle()
    {
        return $this->belongsTo(aboutustitle::class, 'aboutus_id');
    }
    use HasFactory;
}
