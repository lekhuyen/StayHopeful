<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content', 'project_id', 'user_id', 'reply_id', 'status'
    ];
    protected function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    protected function project(){
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
    protected function replies(){
        return $this->hasMany(Comment::class, 'reply_id', 'id');
    }
    use HasFactory;
}
