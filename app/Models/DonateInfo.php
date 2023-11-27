<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonateInfo extends Model
{
    protected $fillable = ['name','email','phone','project_id','method','amount','message'];
    public function project(){
        return $this->belongsTo(Project::class,'project_id');
    }
    use HasFactory;
}
