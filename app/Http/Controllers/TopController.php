<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Note;

use App\Genre;

class TopController extends Controller
{
    public function index() 
    {
        $genres = Genre::all();
        
        return view('my-page.my-page', ['genres' => $genres, ]);
    }
}
