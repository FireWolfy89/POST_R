<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        
        $users = User::all();

        return view('user.listuser', compact('users'));
    }

    public function destroy(User $user){
        
        $user->delete();

        return redirect()->route('user.listuser')->with('success', 'A felhasználó törölve!');

    }

    //User Update
    public function update(Request $request, User $user){
    $request->validate([
        'status' => 'required|in:active,inactive',
    ]);

    $user->update(['status' => $request->status]);

    return redirect()->route('user.listuser')->with('success', 'Felhasználó státusza frissítve!');
    }

    //visszaadja a user view-t
    public function UserDashboard(){
        return view('user.user_dashboard');
    }
}
