@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Blog Edit ({{ $blog->id }})</h3>
            <br>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <form method="post">
                        {{ csrf_field() }}
                        @if($error)
                        <div class="alert alert-danger">{{ $error }}</div>
                        @endif
                        <div class="form-group">
                            <label>Title</label>
                            <input class="form-control" name="title" value="{{ $blog->title }}" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" required>{{ $blog->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                            <input class="form-control" name="tags" value="{{ $blog->tags }}">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="DRAFT" {{ ($blog->status == 'DRAFT') ? 'selected' : '' }}>Draft</option>
                                <option value="PUBLISHED" {{ ($blog->status == 'PUBLISHED') ? 'selected' : '' }}>Published</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Published At</label>
                            <input class="form-control" name="published_at" value="{{ $blog->published_at }}">
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary btn-block">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
