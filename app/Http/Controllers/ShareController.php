<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;

class ShareController extends Controller
{
    public function store($id)
    {
        $user = \Auth::user();
        //dd($note);
        $user->share($id);
        
        return back();
    }
    
    public function destroy($id)
    {
        $user = \Auth::user();
        $user->protect($id);
        
        return back();
    }
}
