<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function notes() 
    {
        return $this->hasMany(Note::class);
    }
    
    public function public_notes() 
    {
        return $this->belongsToMany(Note::class, 'privacy_note', 'user_id', 'privacy_id')->withTimestamps();
    }
    
    public function share($noteId) 
    {
        if(!$this->is_shared($noteId))
        {
            $this->public_notes()->attach($noteId);
            return true;
        }
    }
    
    public function protect($noteId)
    {
        if($this->is_shared($noteId))
        {
            $this->public_notes()->detach($noteId);
            return true;
        }
    }
    
    public function is_shared($noteId)
    {
        return $this->public_notes()->where('privacy_id', $noteId)->exists();
    }
}
