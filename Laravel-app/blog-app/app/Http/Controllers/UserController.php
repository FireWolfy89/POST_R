<?php

namespace App\Http\Controllers;

use App\Models\User;
use League\Csv\Reader;
use League\Csv\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;



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

    //User export

    public function export(){
         $users = User::all();

        $csv = Writer::createFromString('');
        $csv->insertOne(['Name', 'Email', 'Status']);

        foreach ($users as $user) {
            $csv->insertOne([$user->name, $user->email, $user->status]);
        }

       return $csv->output('users.csv');
    }


}


