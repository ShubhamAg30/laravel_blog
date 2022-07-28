@extends('layouts.app')     <!--written a master layout , inside the layouts.app.-->

@section('content')         <!--we are including the section from here.-->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if(count($blogs))          <!--we are checking that, if the count of that $blogs is true , then only it will show the $blogs else will show no $blogs avail. one thing also , we have written here count of $blogs, here $blogs is an object thats why we cant say that if($blogs) then we can do, because &blogs is an object so it will always true, but the count can be 0 if , there is not anything else will be there. -->
                <!--we can check the value inside the $blogs by doing the dd($blogs) but it should be inside the double curly brackets. so when you will do that, you will get a collection object , inside that there will be one key named items, and its value will be an array of n length,inside that array, we have n keys each will store the info abt out blogs and users inside it.-->
                
                @foreach($blogs as $blog)           <!--if the count is not 0 , then we are looping through it, and showing the each blog in the "localhost/" route. each $blog will contain information about the each $blog.-->
                
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $blog->title }}
                    @if($blog->user_id == Auth::id())
                        <a href="{{ route('blog_edit',$blog->id) }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-pencil fa-lg"></i></a>
                    @endif
                    </div>     <!--we are printing the title of the each blog.-->
                    <div class="panel-body">
                        {{ $blog->description }}        <!--showing the correspoding description related to that blog.-->
                        @if($blog->tags)        <!--if their exists tag of the $blog, then we are simply printing it else will be not there.-->
                        <p><i><b>Tags:</b> {{ $blog->tags }}</i></p>    <!--each blog will contain the info of a particular blog, so we are taking its tag , and showing it here.-->
                        @endif
                    </div>
                    <div class="panel-footer">Author: {{ $blog->user->name }}<span      class="pull-right">Published At: {{ $blog->published_at }}</span></div>         <!--here we have written blogs_user_name. in above only we have already combined the blogs and users details together. so in each $blog , we will have blog details og each user, also that blog will contain the info of that user as well.so we are showing the user name by doing this. also the publishing detail is present in the $blog , so we can show it from there.thats all !-->
                </div>
                @endforeach
            @else       <!--and else , it will show no blogs available.-->
            <p class="text-danger">No Blogs avalable</p>
            @endif
        </div>
    </div>
</div>
@endsection
