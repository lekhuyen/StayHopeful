<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPost extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'title', 'user_id', 'deleted_at', 'status'
    ];



    protected function likes(){
        return $this->hasMany(Like::class, 'id_post', 'id');
    }
    protected function comments(){
        return $this->hasMany(CommentPost::class, 'post_id', 'id');
    }
    protected function replies(){
        return $this->hasMany(ReplyComment::class, 'post_id', 'id');
    }
    protected function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    protected function images(){
        return $this->hasMany(PostImage::class, 'post_id', 'id');
    }
    use HasFactory;
}
