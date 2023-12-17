<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aboutuscalltoaction extends Model
{
    protected $fillable = ['title', 'description', 'section', 'lefttitle', 'leftdescription', 'middletitle', 'middledescription', 'righttitle', 'rightdescription'];
    use HasFactory;
}
