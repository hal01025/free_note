<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Genre;
use App\User;
use Storage;

class NotesController extends Controller
{
    public function index() 
    {
        $users = User::all();
        $var_array = [];
        $note_array = [];
        $photo_array = [];
        $num = 0;
        
        foreach($users as $user) 
        {
            $notes = $user->public_notes()->orderBy('id', 'desc')->paginate(10);
            
            foreach($notes as $note) 
            {
                $note_id = $note->id;
                $note_title = $note->title;
                $var_array[$note_id] = $note_title;
            }
        }
        
        krsort($var_array);
        
        foreach($var_array as $id=>$title) 
        {
            $num += 1;
            if($num <= 10)
            {
                $note_array[$id] = $title;
            }
        }
        
        //dd($note_array);
        
        $notes = \Auth::user()->notes()->get();
        
        foreach($notes as $note) 
        {
            $photos = $note->photos()->get();
            
            foreach($photos as $key=>$photo) 
            {
                $num += 1;
                $photo_url = $photo->photos_url;
                $photo_array[$num] = $photo_url;
            }
        }
        
        if($photo_array) 
        {
        krsort($photo_array);
        $photo_array = array_slice($photo_array, 0, 25);
        }
        
        return view('notes.index', ['notes' => $note_array, 'photos' => $photo_array]);
    }
    
    public function show($id) 
    {
        $genre = Genre::find($id);
        $belonging_notes = $genre->belonging_notes();
        $notes = $belonging_notes->where('user_id', \Auth::id())->orderBy('id', 'desc')->paginate(5);
        $count = $belonging_notes->count();
        $my_notes = \Auth::user()->notes()->get();
        $num = 0;
        $photo_array = [];
        
        foreach($my_notes as $note) 
        {
            $photos = $note->photos()->get();
            
            foreach($photos as $key=>$photo) 
            {
                $num += 1;
                $photo_url = $photo->photos_url;
                $photo_array[$num] = $photo_url;
            }
        }
        
        if($photo_array) 
        {
        krsort($photo_array);
        $photo_array = array_slice($photo_array, 0, 25);
        }
        
        return view('notes.list', ['notes' => $notes, 'genre' => $genre, 'photos' => $photo_array]);
    }
    

    
    public function create($id) 
    {
        $genre = Genre::find($id);
        $photo_array = [];
        $num = 0;
        
        $notes = \Auth::user()->notes()->get();
        
        foreach($notes as $note) 
        {
            $photos = $note->photos()->get();
            
            foreach($photos as $key=>$photo) 
            {
                $num += 1;
                $photo_url = $photo->photos_url;
                $photo_array[$num] = $photo_url;
            }
        }
        
        if($photo_array) 
        {
        krsort($photo_array);
        $photo_array = array_slice($photo_array, 0, 25);
        }
        
        return view('notes.create', ['id' => $id, 'genre' => $genre, 'photos' => $photo_array]);
    }
    
    public function store(Request $request, $id) 
    {
        $this->validate($request, [
            'title' => 'required|max:25',
            'description' => 'max:50',
            'article' => 'required|max:1500',
            'photos' => 'max:5',
            'photos[]' => 'file|image|max:2000'
            ]);
        
        $genre = Genre::find($id);
        $note = $genre->belonging_notes()->create([
            'title' => $request->title,
            'description' => $request->description,
            'article' => $request->article,
            'user_id' => \Auth::user()->id,
            'genre_id' => $id,
            ]);
        
        //dd(\Auth::user()->public_notes()->get());
        
        $photos = $request->file('photos'); 
        //dd($photos);
        if ($photos) {
            foreach($photos as $num => $photo) {
                $ext = $photo['file']->guessExtension();
                $user_id = \Auth::id();
                $note_id = $note->id;
                $filename = "{$request->title}.{$user_id}.{$note_id}.{$num}.{$ext}";
                $path = Storage::disk('s3')->putFileAs('photos', $photo['file'], $filename);
                
                Storage::disk('s3')->setVisibility('photos/'.$filename, 'public');
                
                $note->photos()->create([
                    'photos_url'=> Storage::disk('s3')->url($path),
                    'photo_title' => "{$request->title}.{$num}.{$ext}",
                ]);
                    //dd(Storage::disk('s3')->url($path));
            }
            //dd(Storage::disk('s3')->url($path));
        }
            
        
        
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
    
    public function edit($id) 
    {
        $this->validate($request, [
            'title' => 'required|max:25',
            'description' => 'max:50',
            'article' => 'required|max:1500',
            ]);
        
        $note = Note::find($id);
        $photos = $note->photos()->get();
        $photo_array = [];
        $num = 0;
        
        foreach($photos as $num=>$photo)
        {
            $num += 1;
            $url = $photo->photos_url;
            $photo_array[$num] = $url;
        }
        
        $genre = $note->genre()->first();
        //dd($genre);
        
        return view('notes.edit', ['note' => $note, 'photos' => $photo_array, 'genre' => $genre]);
    }
    
    public function update(Request $request, $id)
    {
        $note = Note::find($id);
        
        $note->title = $request->title;
        $note->description = $request->description;
        $note->article = $request->article;
        
        $note->save();
        
        return redirect('my-page');
    }
}
