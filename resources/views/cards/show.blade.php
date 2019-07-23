@extends('...master.layout')

@section('content')

<div class="container">
    <div class="col-md-6 col-md-offset-3">
        <h1>{{$card->title}}</h1>
        <ul class="list-group">
            @foreach($card->notes as $note)

                    <li class="list-group-item">
                    {{--@can('manager')--}}
                        <a href="/notes/{{$note->id}}/edit">
                    {{--@endcan--}}
                            {{$note->body}}
                    {{--@can('manager')--}}
                        </a>
                    {{--@endcan--}}
                     : <a href="#" class="pull-right">{{$note->user->username}}</a>
                    </li>
            @endforeach
        </ul>
        <h3>Add New Note</h3>
        <hr>
        <form class="container" action="/cards/{{$card->id}}/notes" method="post">
        {{ csrf_field() }}
            <div class="form-group">
                <textarea name="body" title="body">{{ old('body') }}</textarea>
            </div>
            <div class="form-group">
                <select name="tags[]" title="tags" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Note</button>
            </div>
        </form>
    </div>
</div>
@endsection