<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request){            /*defined a method here, and one of the request is coming there. */

        // echo date("d M, Y @ h:i A", strtotime("2020-09-12 13:00:00"));

        $data = [];         /*defined a blank array. */
        $data["user"] = Auth::user();           /*We are using the predefined Auth ,and then we are bringing all of the details about logged in user. and then simply we are storing in user key.*/

        return view("profile", $data);          /*simply we are returning the view of profile along with the user details. Now lets move towards the 
        profile.blade.php file */
    }
}
