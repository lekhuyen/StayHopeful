<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class ProjectImage extends Model
{
    protected $table = 'project_images';
    protected $fillable = [
        'image', 'project_id'
    ];
    public function project(){
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
    use HasFactory;
}
