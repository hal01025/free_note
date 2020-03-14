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
    
    public function publication() 
    {
        return $this->belongsToMany(User::class, 'privacy_note', 'privacy_id', 'user_id')->withTimestamps();
    }
    
    public function genre() 
    {
        return $this->belongsTo(Genre::class);
    }
    
    public function photos() 
    {
        return $this->hasMany(Photo::class);
    }
    
    public function share($userId) 
    {
        $this->publication()->attach($userId);
        
        return true;
    }
    
    public function protect($userId)
    {
        $this->publication()->detach($userId);
        
        return true;
    }
    
    public function is_shared($userId)
    {
        return $this->publication()->where('user_id', $userId)->exists();
    }
}
