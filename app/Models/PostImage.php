<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostImage extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'image', 'post_id', 
    ];
    public function userPost(){
        return $this->belongsTo(UserPost::class, 'post_id', 'id');
    }
    use HasFactory;
}