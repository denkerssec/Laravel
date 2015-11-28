@extends('app')
@section('title')
  @if($domain)
    {{ $domain->title }}
      <button class="btn" style="float: right"><a href="{{ url('edit/'.$domain->slug)}}">Edit domain</a></button>
    @endif
  @else
    Page does not exist
  @endif
@endsection
@section('title-meta')
<p>{{ $domain->created_at->format('M d,Y \a\t h:i a') }}</a></p>
@endsection
@section('content')
@if($domain)
  <div>
    {!! $domain->body !!}
  </div>    
  <div>
    <h2>Leave a comment</h2>
  </div>
  @if(Auth::guest())
    <p>Login to Comment</p>
  @else
    <div class="panel-body">
      <form method="domain" action="/comment/add">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="on_domain" value="{{ $domain->id }}">
        <input type="hidden" name="slug" value="{{ $domain->slug }}">
        <div class="form-group">
          <textarea required="required" placeholder="Enter comment here" name = "body" class="form-control"></textarea>
        </div>
        <input type="submit" name='domain_comment' class="btn btn-success" value = "domain"/>
      </form>
    </div>
  @endif
  <div>
    @if($comments)
    <ul style="list-style: none; padding: 0">
      @foreach($comments as $comment)
        <li class="panel-body">
          <div class="list-group">
            <div class="list-group-item">
              <h3>{{ $comment->author->name }}</h3>
              <p>{{ $comment->created_at->format('M d,Y \a\t h:i a') }}</p>
            </div>
            <div class="list-group-item">
              <p>{{ $comment->body }}</p>
            </div>
          </div>
        </li>
      @endforeach
    </ul>
    @endif
  </div>
@else
404 error
@endif
@endsection