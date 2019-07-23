<?php

namespace App\Http\Controllers;

use App\Card;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CardsController extends Controller
{
    public function index()
    {
        $cards = DB::table('cards')->get();
        return(view('cards/cards',compact('cards')));
    }

    public function show(Card $card){
        auth()->loginUsingId(1);
//        $card = Card::find($id);
//        $card = Card::with('notes.user')->find(1);
        $card->load('notes.user');
        $tags = Tag::all();
        return view('cards/show',compact('card','tags'));
    }
}
