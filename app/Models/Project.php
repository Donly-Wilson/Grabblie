<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'user_id'];

    //Add one to many relation (1 project has multiple inspiration)
    public function inspirations()
    {
        return $this->hasMany('App\Models\Inspiration');
    }

    //Discard every inspiration together with deleted project
    public function deleteRelated()
    {
        //Runs inspirations func and deletes every item within it
        $this->inspirations()->delete();
        //Select same parent and delete it === { project->delete() } 
        return parent::delete();
    }

    //Add many to one relation, inverse of one to many (multiple projects belong to 1 user)
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
