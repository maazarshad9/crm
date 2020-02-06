<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Models\Project;
use App\Lead;
use App\Calling;
use App\Meeting;
use App\Project_User;
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
      
      $user = User::where('id',$id)->first();
      $totalAgents = User::where('is_agent','1')->count();
      $totalProjects = Project::count();
      $totalLeads = Lead::count();
      $totalUserCalls = Calling::where('user_id',$id)->count();
      $totalUserMeetings = Meeting::where('user_id',$id)->count();
      $totalUserLeads = Lead::where('user_id',$id)->count();
      $projectUsersCommission = Project_User::where('member_id',$id)->sum('booking_commission') + Project_User::where('member_id',$id)->sum('allocation_commission') + Project_User::where('member_id',$id)->sum('confirmation_commission');
      $projects = Project::latest()->paginate(12);
     $totalCommission = Project_User::sum('booking_commission') + Project_User::sum('allocation_commission') + Project_User::sum('confirmation_commission');
      if (auth()->user()->hasRole(['super-admin']) && $user->id === auth()->user()->id) {
      
        return view('dashboard', ['user' => $user,'totalProjects' => $totalProjects, 'totalLeads' => $totalLeads, 'totalAgents' => $totalAgents, 'totalCommission' => $totalCommission, 'projects' => $projects]);
    }
    else {
       
        return view('dashboard', ['user' => $user,'totalUserCalls' => $totalUserCalls, 'totalUserMeetings' => $totalUserMeetings, 'totalUserLeads' => $totalUserLeads, 'projectUsersCommission' => $projectUsersCommission]);
    }
    }
}
