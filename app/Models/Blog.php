<?php

namespace App\Models;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    /*so if we use the scope, then we have to suffixed with scope+scope_name, here our scope name is Published . so first query will come here, one thing is that, there is two different table named blogs and users. so if we want to retrieve the data from both of them , then generally we will join, but if we use with() , then we dont need to do join, it will do all the things and generate the query , so that query will come here. and then lets see what we do with that query... */
    public function scopePublished($query){
        return $query->where("status", "PUBLISHED");        /*we are taking that query and we are doing where status = "PUBLISHED",means we want to show those details only , which is published from the users side. May be it can happen that user has written some blog, but at that time he dont want to submit , then he/she will put it into the draft i.e if you will see in the blogs table, there is column named status which stores the details related with it. So whenever user will do status = published during the submission , that only we will show in the "localhost/" route. so if we user this scope , then from here ,only the blogs which has published , that blogs will return from here only.   */
    }

    public function scopeDraft($query){
        return $query->where("status", "DRAFT");
    }

    public function scopeSelf($query){          /*this is the self scope that we have used there. So we are taking the $query , and then returning those rows only where user_id = Auth::id() , means in that blog_list route, only that list will be present ,which is published or drafted by that logged in user..  */
        return $query->where("user_id", Auth::id());        /*now lets return to the BlogController again. */
    }
}
