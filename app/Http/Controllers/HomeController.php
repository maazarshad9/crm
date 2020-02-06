<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
      $id= auth()->user()->id;
      $user = User::find($id)->first();
        return view('dashboard')->with('user',$user);
    }
}
