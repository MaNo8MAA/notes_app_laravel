<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


$user = Auth::user();
$id = Auth::id();

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::latest()->Paginate(5);
        return view('notes.indexNote')->with('Note', $notes);
        // $notes = Note::where('user_id', Auth::id())->Paginate(5); //->with('Note', $notes);
        // return view('notes.indexNote')->with('Note', $notes);
        //
    }
    public function notesTrashed()
    {
        $note = Note::onlyTrashed()->get();
        return view('trashedNote')->with('Note', $note);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.createNote');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the values
        $this->validate($request, [
            'content' => 'required',
            'type' => 'required',

        ]);

        //change the name of photo
        $photo = $request->photo;
        $newPhoto = time() . $photo->getClientOriginalName();
        $photo->move('uploads/notes' . $newPhoto);

        // store data
        $note = Note::create([
            'user_id' =>  auth()->id(),
            'content' => $request->content,
            'type' => $request->type,
            'photo' => 'uploads\notes' . $newPhoto,
            //'slug' => str_slug($request->type),

        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $note = Note::where('id', $id)->first();
        return view('notes.showNote')->with('note', $note);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $note = Note::find($id);
        return view('notes.editNote')->with('note', $note);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $note = Note::find($id);
        $this->validate($request, [
            'content' => 'required',
            'type' => 'required',

        ]);
        if ($request->has('photo')) {
            $photo = $request->photo;
            $newPhoto = time() . $photo->getClientOriginalName();
            $photo->move('uploads/notes', $newPhoto);
            $note->photo = 'uploads/notes/' . $newPhoto;
        }

        $note->type = $request->type;
        $note->content = $request->content;
        $note->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */

    //SoftDelete
    public function destroy($id)
    {

        $note = Note::find($id);
        $note->delete();
        return redirect()->back();
    }


    //HardDelete
    public function hardDelete($id)
    {
        $note = Note::withTrashed()->where('id', $id)->first();
        $note->forceDelete();
        return redirect()->back();
    }

    public function restore($id)
    {
        $note = Note::withTrashed()->where('id', $id)->first();
        $note->restore();
        return redirect()->back();
    }
}
