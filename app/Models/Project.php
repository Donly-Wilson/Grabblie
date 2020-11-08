<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title'];

    //Add one to many relation (1 project has multiple inspiration)
    public function inspirations()
    {
        return $this->hasMany('App\Models\Inspiration');
    }
}
