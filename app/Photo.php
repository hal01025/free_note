<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['photos_url', 'notes_id'];
    
    public function note() 
    {
        return $this->belongsTo(Note::class);
    }
}
