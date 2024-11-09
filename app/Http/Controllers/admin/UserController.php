<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index',[
            'route'=>'users',
            'users' => User::all()
        ]);
    }

    public function destroy(User $user)
    {
        if($user->orders()){
            $user->orders()->delete();
        }
        $user->delete();
        return redirect()->route('users.index')
                         ->withSuccess('Customer account is deleted successfully.');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $users = User::where('fname','LIKE','%'.$search.'%')->get();
        return view('admin.users.index',['users'=>$users,'route'=>'users',]);
    }
}
