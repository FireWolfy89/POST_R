<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    //visszaadja az admin view-t
    public function AdminDashboard(){

        return view('admin.admin_dashboard');

    }
}
