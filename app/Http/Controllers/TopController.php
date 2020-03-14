<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Note;

use App\Genre;

class TopController extends Controller
{
    public function index() 
    {
        $photo_array = [];
        $genres = Genre::all();
        $notes = \Auth::user()->notes()->get();
        $num = 0;
        
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
        
        krsort($photo_array);
        $photo_array = array_slice($photo_array, 0, 25);
        
        //dd($photo_array);

        return view('my-page.my-page', ['genres' => $genres, 'photos' => $photo_array]);
    }
}
