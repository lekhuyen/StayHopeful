<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactdetail extends Model
{
    protected $fillable = ['message','contact_id'];
    use HasFactory;
}
