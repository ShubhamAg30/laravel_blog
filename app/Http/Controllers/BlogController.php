<?php

namespace App\Http\Controllers;

use Exception;
use Validator;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller         /*every class extenda the Controller class. */
{

    public function __construct(){
        $this->middleware('check_blog_exist')->only(['detail', 'edit', 'delete']);
    }

    public function index(){        /*this method will be called, if user will hit that route. */
        $data = [];     /*data is a blank array . */
        $data["blogs"] = Blog::with("user")->published()->get();        /*blogs is a key inside the data array , and we are storing some of the values inside it. So , lets see, Blog is modal , and one table is there in Db named users, so in that blogs tables, there is only the details of blogs like blog title,desc,tags,published_at etc. so basically, whenever user will hit that route, we want to show our blogs to everyone, it doesnt matter that user is logged or registered or not. So , we are showing our blogs in home page, which is publically available for everyone. therefore , along with the blog details, we need users details as well , then we can get the details of users also. so users is another table in our Db.therefore, we want the data of blogs with users as well. here published() is a scopes,(Laravel provides a solution for wrapping your conditions into a readable and reusable statement, called Scopes.), so lets go and check out the published scope in Blog modal.*/

        return view("blog.blog_list_frontend", $data);      /*so we have stored all the details in blogs key. dont get confuse, blogs is key as well as the table name.
        now we are returing the view of blog_list_frontend along with the data.lets see the view now. */
    }

    public function list(Request $request){         /*defined a list method here, and request is coming from the user. */
        $data = [];             /*defined a blank data array. */
        $data["blogs"] = Blog::self()->get();           /*Here Blog is the modal, and self is the scope that we have defined in the Blog.php. lets go to see whats doing that method. */
        return view("blog.blog_list", $data);          
         /*after all these,we are returning the view if blog_list.blade.php along with the data. Now lets move to the view directory. */
    }

    public function detail(Request $request, $id){
        $data = [];
        $data["blog"] = Blog::find($id);

        return view("blog.blog_detail", $data);
    }

    public function add(Request $request){          /*this is the add method, which takes the Request from user. */
        $data = [];             /*a blank array */
        $data["error"] = "";            /*inside that array, we have taken a key named error, which is by-default be null. */

        if($request->isMethod("post")){         /*so if the http request that user has sended will be Post type , then will go further else will return the view of blog_add with the data. */
            try{
                $request->flash();
                $validator = Validator::make($request->all(), [
                    "title" => "required|max:100",
                    "description" => "required|max:1000",
                    "tags" => "nullable|regex:/^[a-zA-Z ,]*$/",
                    "status" => "required|in:DRAFT,PUBLISHED",
                    "published_at" => "nullable|date"
                ]);
                if($validator->fails()){
                    throw new Exception($validator->errors()->first());
                }

                $title = $request->input("title");
                $description = $request->input("description");
                $tags = $request->input("tags");
                $status = $request->input("status");
                $published_at = $request->input("published_at");

                $blog = new Blog();
                $blog->user_id = Auth::id();
                $blog->title = $title;
                $blog->description = $description;
                $blog->tags = $tags;
                $blog->status = $status;
                $blog->published_at = $published_at;
                $blog->save();

                return redirect(route("blog_list"));
            }catch(Exception $e){
                $data["error"] = $e->getMessage();
            }
        }
        return view("blog.blog_add", $data);
    }

    public function edit(Request $request, $id){
        $data = [];
        $data["error"] = "";

        $data["blog"] = Blog::find($id);

        
        try{
            if($request->isMethod("post")){
                
                $title = $request->input("title");
                $description = $request->input("description");
                $tags = $request->input("tags");
                $status = $request->input("status");
                $published_at = $request->input("published_at");

                $blog = Blog::find($id);
                
                $blog->title = $title;
                $blog->description = $description;
                $blog->tags = $tags;
                $blog->status = $status;
                $blog->published_at = $published_at;

                $blog->save();

                return redirect(route("blog_detail", $id)); 
            }
        }catch(Exception $e){
            $data['error'] = $e->getMessage();
        }

        return view("blog.blog_edit",$data);
    }

    public function delete(Request $request,$id){
        Blog::find($id)->delete();
        return redirect(route("blog_list"));
    }
}
