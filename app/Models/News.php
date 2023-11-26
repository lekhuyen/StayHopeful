<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class News extends Model
{   use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public $fillable = ['title', 'description'];
    public function images() {
        return $this->hasMany(NewsImage::class, 'news_id', 'id');
    }
    use HasFactory;
}
