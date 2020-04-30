<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class adminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = User::where('role_id','=',2)->get();
        return view('admin.dashboard',compact('users'));
    }

    public function block(Request $request, User $user)
    {
        // if (!empty($user->blocked_at)) {
        //     $user->blocked_at = Null;
        // } else {
        //     $user->blocked_at = now();
        // }

        $blockupdate = (empty($user->blocked_at)) ? now() : Null ;

        $user->update([$user->blocked_at = $blockupdate]);

        return redirect(route('admin.dashboard'))->with('message','status changed');

    }

}
