<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspiration extends Model
{
    use HasFactory;

    protected $fillable = ['image_url', 'image_info', 'project_id'];

    //Add many to one relation, inverse of one to many (multiple inspiration belong to 1 project)
    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
}
