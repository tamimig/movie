<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie; 

class Actor extends Model
{
    protected $fillable = ['name', 'sex', 'date_of_birth', 'bio'];

    public function movies()
    {
    	return $this->belongsToMany(Movie::class)->withTimestaps(); 
    }

   
}
