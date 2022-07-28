@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Blog <a href="{{ route('blog_edit', $blog->id) }}" class="btn btn-primary pull-right">Edit</a></h3>
            <br>
            <div class="panel panel-default">
                <div class="panel-heading">{{ $blog->title }}<span class="pull-right badge">{{ $blog->status }}</span></div>

                <div class="panel-body">
                    {{ $blog->description }}
                    @if($blog->tags)
                    <p><i><b>Tags:</b> {{ $blog->tags }}</i></p>
                    @endif
                </div>
                <div class="panel-footer">Author: {{ $blog->user->name }}<span      class="pull-right">Published At: {{ $blog->published_at }}</span></div>
            </div>
        </div>
    </div>
</div>
@endsection
