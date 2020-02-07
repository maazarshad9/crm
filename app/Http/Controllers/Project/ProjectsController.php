<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Lead;
use App\Models\Project;
use App\User;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::latest()->paginate(12);
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Lead::isCustomer(true)->get();
        return view('projects.create', ['users' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = Project::create(
            $request->merge([
                'owner_id' => auth()->user()->id
            ])->all());
        return redirect()->route('projects.index')->withStatus(__('Project successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        $userIds = $project->members()->pluck('member_id')->toArray();
<<<<<<< HEAD

=======
>>>>>>> df0b4bdc1601e09b0c24b8129f6d56824547c855
        $totalComission = $project->members->sum(function($p){ 
            return $p->pivot->booking_commission + 
                    $p->pivot->allocation_commission +
                    $p->pivot->confirmation_commission; 
        });

<<<<<<< HEAD
        $users = User::latest()->isAgent(true)->whereNotIn('id', $userIds)->get();
=======
        // $users = User::latest()->isAgent(true)->whereNotIn('id', $userIds)->get();
        $users = User::latest()->isAgent(true)->get();
>>>>>>> df0b4bdc1601e09b0c24b8129f6d56824547c855
        return view('projects.show', compact('project', 'users', 'totalComission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
