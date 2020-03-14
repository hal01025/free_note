<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Photo;


class NoteDetailsController extends Controller
{
    public function show($id)
    {
        $note = Note::find($id);
        //dd($note);
        if($note->photos()->exists())
        {
            $photos = $note->photos()->get();
            $photo_array = [];
            $num = 0;
            
            foreach($photos as $num=>$photo)
            {
                $num += 1;
                $url = $photo->photos_url;
                $photo_array[$num] = $url;
            }
        }else{
            $photo_array = [];
        }
        
        return view('notes.detail', ['note' => $note, 'photos' => $photo_array]);
    }
}
