<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Pagination\LengthAwarePaginator;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request, [
            'searchText' => 'required|max:30',
            ]);
            
        $users = User::all();
        $note_array = [];
        $note_container = [];
        $key = 0;
        $num = 0;
        
        $searchText = $request->searchText;
        
        foreach($users as $user) 
        {
            $notes = $user->public_notes();
            $searched_notes = $notes->where('title', 'LIKE', '%'.$searchText.'%')->orwhere('description', 'LIKE', '%'.$searchText.'%')->orderBy('id', 'desc')->get();
            foreach($searched_notes as $searched_note)
            {
                $key += 1;
                
                $note_array['id'] = $searched_note->id;
                $note_array['title'] = $searched_note->title;
                $note_array['description'] = $searched_note->description;
                
                $note_container[$key] = $note_array;
            }
        }

        
        $result_notes = new LengthAwarePaginator(
            array_slice($note_container, ($request->page - 1)*5),
            count($note_container),
            5,
            $request->page,
            array('path' => $request->url())
        );
        
        //dd($request->url());
        //dd($result_notes);
        
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
        
        return view('notes.search', ['notes' => $result_notes, 'photos' => $photo_array]);
    }
}
