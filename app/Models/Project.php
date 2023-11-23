<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'image', 'description','status', 'money', 'money2', 'category_id'
    ];
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function images(){
        return $this->hasMany(ProjectImage::class, 'project_id', 'id');
    }
    use HasFactory;
}
