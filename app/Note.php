<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['article', 'user_id', 'genre_id', 'title', 'description'];
    
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
    
    public function privacy() 
    {
        return $this->belongsToMany(User::class);
    }
    
    public function genre() 
    {
        return $this->belongsTo(Genre::class);
    }
    
    public function photos() 
    {
        return $this->hasMany(Photo::class);
    }
}
