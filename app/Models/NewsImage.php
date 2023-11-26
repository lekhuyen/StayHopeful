<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsImage extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'image', 'news_id'
    ];
    public function new(){
        return $this->belongsTo(News::class, 'news_id', 'id');
    }
    use HasFactory;
}
