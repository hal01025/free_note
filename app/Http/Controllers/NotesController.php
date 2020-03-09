<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Genre;
use Storage;

class NotesController extends Controller
{
    public function index() 
    {
        $notes = Note::orderBy('id', 'desc')->paginate(10);


        return view('notes.index', ['notes' => $notes]);
    }
    
    public function show($id) 
    {
        $genre = Genre::find($id);
        $belonging_notes = $genre->belonging_notes();
        $notes = $belonging_notes->orderBy('id', 'desc')->paginate(5);
        $count = $belonging_notes->count();
        
        return view('notes.list', ['notes' => $notes, 'genre' => $genre]);
    }
    

    
    public function create($id) 
    {
        $genre = Genre::find($id);
        
        return view('notes.create', ['id' => $id, 'genre' => $genre ]);
    }
    
    public function store(Request $request, $id) 
    {
        $genre = Genre::find($id);
        $note = $genre->belonging_notes()->create([
            'title' => $request->title,
            'description' => $request->description,
            'article' => $request->article,
            'user_id' => \Auth::user()->id,
            'genre_id' => $id,
            ]);
            
        
        
        $photos = $request->file('photos'); 
        //dd($photos);
        
        
        if (!$photos === null) {
            foreach($photos as $num => $photo) {
                $filename = "{$request->title}.{$num}.jpg";
                $path = Storage::disk('s3')->putFileAs('photos', $photo['file'], $filename);
                
                Storage::disk('s3')->setVisibility('photos/'.$filename, 'public');
                
                $note->photos()->create([
                    'photos_url'=> Storage::disk('s3')->url($path),
                    ]);
            }
        }
        //dd($note->photos()->first()->photos_url);
        
        return redirect('my-page');
    }
    
    public function destroy($id) 
    {
        $note = Note::find($id);
        
        if(\Auth::id() === $note->user_id) 
        {
            $note->delete();
        }
        
        return redirect('my-page');
    }
}
