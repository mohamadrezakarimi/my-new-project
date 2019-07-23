<?php

namespace App\Http\Controllers;

use App\Card;
use App\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function store(Request $request,Card $card){
        //dd($request->input('tags'));
        $note = new Note($request->all());
        $note->user_id = 1;
        $card->notes()->save($note);
        $tagIds = $request->input('tags');
        $note->tags()->attach($tagIds);
        //$note->body = $request->body;
        //$card->notes()->save($note);
        \Session::flash('Flash_messege','note created succesfulli.i am talking you in session.');
        return back();
    }

    public function edit(Note $note){
        auth()->loginUsingId(1);
        $this->authorize('edite',$note);
        return view('notes/edit',compact('note'));
    }

    public function updlate(Note $note,Request $request){
        $note->update($request->all());
        return back();
    }
}
