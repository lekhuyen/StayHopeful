<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    use HasFactory;
    protected $fillable = ["finding_source", "enrolled", "name", "phone", "email", "role", "avail_date", "project_id", "project_title", "voting_description", "rel_name", "rel_relationship", "rel_phone"];
}
