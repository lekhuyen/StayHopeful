<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentPost extends Model
{
    protected $fillable = [
        'content', 'post_id', 'user_id', 'reply_id', 'status'
    ];
    protected function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    protected function post(){
        return $this->belongsTo(UserPost::class, 'post_id', 'id');
    }
    protected function replies(){
        return $this->hasMany(CommentPost::class, 'reply_id', 'id');
    }
    use HasFactory;
}
