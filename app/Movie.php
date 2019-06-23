<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Actor;
use App\Producer;  
class Movie extends Model
{
    protected $fillable = ['name', 'producer_id' , 'year_of_release', 'plot', 'image'];

    public function actors()
    {
    	return $this->belongsToMany(Actor::class)->withTimestamps(); 
    }

    public function producer()
    {
    	return $this->belongsTo(Producer::class); 
    }
}
