<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.users.lists', compact(
            'users'
        ));
    }

    public function add(){

        return view('admin.users.add');
    }

    public function edit(User $user){

    }

    public function delete(User $user){

    }
}
