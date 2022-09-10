<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;

class DashboardController extends Controller
{

    public function index(Request $request){
        //$this->authorize('viewAny', Post::class);



//       if (Gate::allows('users.view' )){
//           echo 'Được phép';
//       }

//       if (Gate::denies('users.view')){
//           echo 'Không được phép';
//       }

        return view('admin.dashboard.dashboard');
    }
}
