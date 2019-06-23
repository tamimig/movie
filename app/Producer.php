<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie; 
class Producer extends Model
{
    protected $fillable = ['name', 'movie_id' , 'sex', 'date_of_birth', 'bio'];


    public function movies()
    {
    	return $this->hasMany(Movie::class);
    }
}
