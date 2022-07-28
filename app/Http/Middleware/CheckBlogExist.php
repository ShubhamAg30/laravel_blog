<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class CheckBlogExist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $route = $request->route();
        $id = $route->parameters["id"];
        
        $blog = Blog::where("id", $id)->where("user_id", Auth::id())->first();
        if(!$blog){
            echo view("error.not_found");
            die;
        }
        
        return $next($request);
    }
}
