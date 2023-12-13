<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    protected $fillable = ['user_email', 'otp', 'otp_attempts'];
    protected function user(){
        return $this->belongsTo(User::class, 'user_email', 'email');
    }
    use HasFactory;
}
