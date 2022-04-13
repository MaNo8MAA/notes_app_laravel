<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NotePublicController extends Controller
{
    public function index()
    {
        //$note = Note::latest()->Paginate(5);
        return view('home');
        //->with('Note', $note);
    }
}
