<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Module;

class GroupController extends Controller
{
    public function index(){

        $groups = Group::all();

        return view('admin.groups.lists', compact('groups'));
    }

    public function add(){

    }

    public function edit(Group $group){

    }

    public function delete(Group $group){

    }

    public function permission(Group $group){

        $modules = Module::all();

        return view('admin.groups.permission', compact('group',
        'modules', 'group'));
    }

    public function postPermission(Group $group, Request $request){
        if ($request->role){
            $roleJson = json_encode($request->role);
        }else{
            $roleJson = null;
        }

        $group->permissions = $roleJson;
        $group->save();

        return back()->with('msg', 'Phân quyền thành công');
    }
}
