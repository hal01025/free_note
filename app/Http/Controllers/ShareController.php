<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;

class ShareController extends Controller
{
    public function store($id)
    {
        $note = Note::find($id);
        //dd($note);
        $note->share(\Auth::id());
        
        return back();
    }
    
    public function destroy($id)
    {
        $note = Note::find($id);
        $note->protect(\Auth::id());
        
        return back();
    }
}
