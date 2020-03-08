<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Genre;

class NotesController extends Controller
{
    public function index() 
    {
        $notes = Note::all();
        
        return view('notes.index', ['notes' => $notes]);
    }
    
    public function show($id) 
    {
        $genre = Genre::find($id);
        $notes = $genre->belonging_notes()->get();
        
        return view('notes.list', ['notes' => $notes]);
    }
    

    
    public function create($id) 
    {
        return view('notes.create', ['id' => $id ]);
    }
    
    public function store(Request $request, $id) 
    {
        $genre = Genre::find($id);
        $genre->belonging_notes()->create([
            'title' => $request->title,
            'description' => $request->description,
            'article' => $request->article,
            'user_id' => \Auth::user()->id,
            'genre_id' => $id,
            ]);

        return redirect('my-page');
    }
}
