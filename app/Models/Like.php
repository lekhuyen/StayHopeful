<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public $fillable = [
        'id_post', 'id_user'
    ];
    public function post(){
        return $this->belongsTo(UserPost::class, 'id_post', 'id' );
    }
    public function user(){
        return $this->belongsTo(User::class, 'id_post', 'id' );
    }
    use HasFactory;
}
