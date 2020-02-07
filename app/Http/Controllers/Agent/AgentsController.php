<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\assignRole;

class AgentsController extends Controller
{
    public function index(User $model)
    {
        return view('agents.index', ['users' => $model->isAgent(true)->paginate(15)]);
    }

    public function create()
    {
    	return view('agents.create');
    }
<<<<<<< HEAD

    public function show($id)
    {
        $user = User::findOrFail($id);
        $user->isAgent(true);
        if (auth()->user()->hasRole(['super-admin']) || $user->id === auth()->user()->id) {
=======
    public function show($id)
    {
    
        $user = User::findOrFail($id);
        $user->isAgent(true);
        if (auth()->user()->hasRole(['super-admin|agent']) || $user->id === auth()->user()->id) {
>>>>>>> df0b4bdc1601e09b0c24b8129f6d56824547c855
            return view('users.show', ['user' => $user]);
        }
        return back();
    }

<<<<<<< HEAD
=======
    

>>>>>>> df0b4bdc1601e09b0c24b8129f6d56824547c855
    public function store(UserRequest $request, User $model)
    {
        $model->create(
        	$request->merge([
        		'password' => Hash::make($request->get('password')),
        		'is_agent' => 1
        	])->all());

        $model->assignRole('agent');

        return redirect()->route('agents.index')->withStatus(__('Agent successfully created.'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('agents.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
            ->except([$request->get('password') ? '' : 'password']
        ));

        return redirect()->route('agents.index')->withStatus(__('Agent successfully updated.'));
    }
}
