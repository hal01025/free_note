<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['article', 'user_id'];
    
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
    
    public function privacy() 
    {
        return $this->belongsToMany(User::class);
    }
}
