<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;
    protected $fillable = [
        "finding_source", "enrolled", "name", "phone", "email", "project_id",
        "volunteer_description", "rel_name", "rel_relationship", "rel_phone"
    ];
}
