<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'title', 'image', 'description','status', 'money', 'money2', 'category_id'
    ];
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function images(){
        return $this->hasMany(ProjectImage::class, 'project_id', 'id');
    }
    public function donateinfo(){
        return $this->hasMany(DonateInfo::class, 'project_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class, 'project_id', 'id');
    }
    use HasFactory;
}
