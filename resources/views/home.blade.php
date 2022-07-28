@extends('layouts.app')         <!--extending from layout.app, where the skeleton of the is defined, here we will extend that page, and will use it , and whenever we want to change or add some section, we can add there. -->

<!--this is the home page of our blog website. Only that user can come here who are logged in. because we have used middleware, so at starting only , according to the http request from user, it work accordingly .If you will hit route "http://localhost/aaqib/laravel_auth/public/home" then , it will not allow you to go to the home route utill and unless , you are passed with middleware condition.-->

<!-- here simply , we are telling to the user that , yes now you are logged in, and you can see our dashboard !  -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>      

                <div class="panel-body">
                    

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- thats all the things here, now lets go and check the other route that we have defined there. -->
