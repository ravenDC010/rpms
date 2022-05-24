<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Http\Controllers\HomeController;

class UserController extends Controller
{
    public function view(){

        $admins=User::query()
        ->where('role','admin')
        ->get();

        return view('admins.view_admins',['admins' => $admins]);
    }

    public function add(){
        return view('admins.add_admins');
    }

    public function viewTeacher(){
        $Teachers=User::query()
        ->where('role','teacher')
        ->get();

        return view('coaches.view_coaches',['coaches' => $Coaches]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
        ]);

        if ($request['role'] == 'teacher'){
            return back()->with('success', 'Successfully added a new teacher!');
        }
        else{
            return back()->with('success', 'Successfully added a new admin!');
        }
    }

    public function edit($id){
        $user=User::find($id);
        return view('users.edit',['user' => $user]);
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        // User::create([
        //     'name' => Auth::user()->name,
        //     'email' => $request['email'],
        //     'password' => Hash::make($request['password']),
        //     'role' => Auth::user()->role,
        // ]);

        DB::table('users')
        ->where('id', $id)
        ->update(['email' => $request['email'], 'password' => Hash::make($request['password'])]);

        return redirect()->action([HomeController::class, 'index']);
        // return back()->with('success', 'Successfully updated profile!');

    }


}
