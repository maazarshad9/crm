<?php

namespace App\Http\Controllers\Calling;

use App\Http\Controllers\Controller;
use App\Calling;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CallingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Calling $model)
    {

        $model = $model->isCustomer(false);

        if (!auth()->user()->hasRole(['super-admin'])) {
            $model = $model->where('created_by', auth()->user()->id);
        }


        // check if the role is agent
        // if agent then list his own leads
        // if super admin then continue

        return view('callings.index', [
            'callings' => $model->latest()->paginate(15),
            'count' => $model->count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        return view('callings.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Calling $model)
    {
       $model->create(
        $request->merge([
            'calling_date' => Carbon::parse($request->calling_date),
            'created_by' => auth()->user()->id
        ])->all());

       return redirect()->route('callings.index')->withStatus(__('Calling successfully created.'));
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Calling $calling)
    {
        if (!auth()->user()->hasRole(['super-admin']) && $calling->created_by !== auth()->user()->id) {
            abort(404);
        }

        $users = User::get();
        return view('callings.edit', compact('calling', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calling $calling)
    {
        $calling->update(
             $request->merge([
			 'calling_date' => Carbon::parse($request->calling_date),
             'updated_by' => auth()->user()->id
        ])->all());

        return redirect()->route('callings.index')->withStatus(__('Calling successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calling $calling)
    {
        $calling->delete();
        return redirect()->route('callings.index')->withStatus(__('Calling successfully deleted.'));
    }

}
