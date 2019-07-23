@extends('...master.layout')

@section('content')
    <h1>All Cards must be show in here.</h1>
    @foreach($cards as $card)
        <div>
            <a href="/cards/{{ $card->id }}">{{ $card->title }}</a>
        </div>
    @endforeach
    <pre>
    {{var_dump($errors)}}
    </pre>
@endsection