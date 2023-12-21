<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aboutuspageimage extends Model
{
    protected $fillable = ["url_image", "aboutus_id"];

    public function page()
    {
        return $this->belongsTo(Aboutuspage::class, 'aboutus_id');
    }

    use HasFactory;
}
