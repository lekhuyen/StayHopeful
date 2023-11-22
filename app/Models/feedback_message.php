<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback_message extends Model
{
    protected $fillable = ['rating','message'];
    use HasFactory;
}
