<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //visszaadja a user view-t
    public function UserDashboard(){
        return view('user.user_dashboard');
    }
}
