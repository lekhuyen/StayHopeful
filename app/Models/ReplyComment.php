<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyComment extends Model
{
    protected $fillable = [
        'content', 'post_id', 'user_id', 'status', 'comment_id'
    ];
    use HasFactory;
}
