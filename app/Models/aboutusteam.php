<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aboutusteam extends Model
{
    protected $fillable = ["name","age","email","skill", "status","description"];

    public function images(){
        return $this->hasMany(aboutusimage::class, "aboutus_id");
    }
    use HasFactory;
}
