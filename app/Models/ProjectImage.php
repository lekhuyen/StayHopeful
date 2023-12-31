<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectImage extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'project_images';
    protected $fillable = [
        'image', 'project_id'
    ];
    public function project(){
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
    use HasFactory;
}
