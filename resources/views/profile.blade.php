@extends('layouts.app')     <!--extending from master layout-->

@section('content')         <!--adding new content-->

<!--this page is basically use for showing the profile to the user. Also one thing, only one can see the profile , who is logged in. -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>
                
                <div class="panel-body">
                    <p><b>Id: </b>{{ $user->id }}</p>       <!--showing the id.-->
                    <p><b>Name: </b>{{ $user->name }}</p>       <!--showing the name of the user.-->
                    <p><b>Email: </b>{{ $user->email }}</p>         <!--showing the email of the user.-->
                    <p><b>Created At: </b>{{ $user->created_at }}</p>           <!--showing the created date to the logged in user.-->
                    <p><b>Updated At: </b>{{ $user->updated_at->diffForHumans() }}</p>      <!--In blogs table,type of updated_at col is same as the created_at , but here we are showing in other format using diffForHumans method. this method is in-built in laravel. -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!--thats all for this page.-->
