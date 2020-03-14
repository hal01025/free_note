<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Genre;
use App\User;
use Storage;
use Illuminate\Pagination\LengthAwarePaginator;

class NotesController extends Controller
{
    public function index(Request $request) 
    {
        $users = User::all();
        $var_array = [];
        $note_array = [];
        $photo_array = [];
        $sort = [];
        $num = 0;
        
        $user1 = User::find(1);
        //dd($user1->public_notes()->get());
        
        foreach($users as $user) 
        {
            $notes = $user->public_notes()->get();
            
            foreach($notes as $key=>$note) 
            {
                $note_id = $note->id;
                $note_title = $note->title;
                $var_array['title'] = $note_title;
                $var_array['id'] = $note_id;
                
                $note_array[$key] = $var_array;
            }
        }
        
        foreach ((array) $note_array as $key => $value) {
            $sort[$key] = $value['id'];
        }
        
        array_multisort($sort, SORT_DESC, $note_array);
        //dd($note_array);

        $public_notes = new LengthAwarePaginator(
            array_slice($note_array, ($request->page - 1)*8),
            count($note_array),
            8,
            $request->page,
            array('path' => $request->url())
        );

        //dd($request->url());
        //dd($public_notes);
        
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
        
        return view('notes.index', ['notes' => $public_notes, 'photos' => $photo_array]);
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
        
        //dd($notes);
        
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
            'title' => 'required|max:15',
            'description' => 'max:30',
            'article' => 'required|max:1000',
            'photos' => 'max:5',
            'photos.*.file' => 'file|image|max:2000',

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
                //dd($photo['file']);
                if($photo['file']) {
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
                }
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
