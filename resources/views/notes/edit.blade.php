@extends('../master/layout')
@section('content')
<div class="container">
    <h3>edit note</h3>
    <form class="container" action="/notes/{{$note->id}}" method="post">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="form-group">
            <textarea name="body" title="body">{{$note->body}}</textarea>
        </div>
        {{--@can('edite-note',$note)--}}
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Edit Note</button>
        </div>
        {{--@endcan--}}
     </form>
     @unless($note->tags->isEmpty())
        <h4>Tags</h4>
        <ul>
        @foreach($note->tags as $tag)
            <li>{{$tag->name}}</li>
        @endforeach
        </ul>
     @endunless
 </div>
@endsection