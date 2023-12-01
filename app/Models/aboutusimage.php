<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aboutusimage extends Model
{
    protected $fillable = ["url_image","aboutus_id"];

    protected $table = 'aboutus_images';
    public function product() {
        return $this->belongsTo(aboutusteam::class);
    }
    use HasFactory;
}
