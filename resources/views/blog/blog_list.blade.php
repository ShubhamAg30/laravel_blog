@extends('layouts.app')         <!--extended from master layout-->

@section('content')         <!--addding pur new section here.-->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!--here in a tag, in href we are giving the route of blog_add , i.e , whenever anyone will press that button, user will be routed to the blog_add.-->
            <h3>Blog <a href="{{ route('blog_add') }}" class="btn btn-primary pull-right">Add</a></h3>
            <br>
            
            <!--so, the logged in user can see that , whatever the blogs he/she has written is from their control. So all published or drafted blogs will be there, only published blogs will be shown to the other users. So all these details, we are showing in the table format.-->
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Tags</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Published At</th>
                    <th>Action</th>
                </tr>

                
                <!--so if we will do dd($blogs) , then we will get all the blogs that is written by that user. and if that $blogs will true then only it will go inside else it will show no blogs.-->
                @if($blogs)     
                    @foreach($blogs as $blog)       <!--so that $blogs can more than once, it depends on user that how much blogs he/she has written. All of the blogs , will be stored in that $blogs array. basically its a key of $data in BlogController , and here it becomes the variable.-->
                    <tr>
                        <!--simply in each rows , we are showing the output here.-->
                        <td>{{ $blog->id }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->tags }}</td>
                        <td>{{ $blog->status }}</td>
                        <td>{{ $blog->created_at }}</td>
                        <td>{{ $blog->published_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a type="button" href="{{ route('blog_detail', $blog->id) }}" data-toggle="tooltip" title="View" class="btn btn-warning  btn-sm"><i class="fa fa-eye fa-md"></i></a>
                                <a type="button" href="{{ route('blog_edit', $blog->id) }}" data-toggle="tooltip" title="Update" class="btn btn-success btn-sm"><i class="fa fa-pencil fa-md"></i></a>
                                <a type="button" href="{{ route('blog_delete', $blog->id) }}" data-toggle="tooltip" title="Delete" class="btn btn-danger  btn-sm"><i class="fa fa-trash fa-md" ></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                @else
                <tr><td colspan="7">No Blog</td></tr>
                @endif
            </table>
        </div>
    </div>
</div>
@endsection
