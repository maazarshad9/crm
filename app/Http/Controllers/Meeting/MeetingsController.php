<?php

namespace App\Http\Controllers\Meeting;

use App\Http\Controllers\Controller;
use App\Meeting;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MeetingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Meeting $model)
    {

        $model = $model->isCustomer(false);

        if (!auth()->user()->hasRole(['super-admin'])) {
            $model = $model->where('created_by', auth()->user()->id);
        }


        // check if the role is agent
        // if agent then list his own leads
        // if super admin then continue

        return view('meetings.index', [
            'meetings' => $model->latest()->paginate(15),
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
        return view('meetings.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Meeting $model)
    {
       $model->create(
        $request->merge([
            'last_date' => Carbon::parse($request->last_date),
            'created_by' => auth()->user()->id
        ])->all());

       return redirect()->route('meetings.index')->withStatus(__('Meeting successfully created.'));
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
    public function edit(Meeting $meeting)
    {
        if (!auth()->user()->hasRole(['super-admin']) && $meeting->created_by !== auth()->user()->id) {
            abort(404);
        }

        $users = User::get();
        return view('meetings.edit', compact('meeting', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meeting $meeting)
    {
        $meeting->update(
             $request->merge([
			 'meeting_date' => Carbon::parse($request->meeting_date),
             'updated_by' => auth()->user()->id
        ])->all());

        return redirect()->route('meetings.index')->withStatus(__('Meeting successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meeting $meeting)
    {
        $meeting->delete();
        return redirect()->route('meetings.index')->withStatus(__('Meeting successfully deleted.'));
    }

    public function changeToCustomer($id)
    {
        Lead::findOrFail($id)->update([
            'is_customer' => true,
            'updated_by' => auth()->user()->id
        ]);
        return redirect()->route('leads.index')->withStatus(__('Lead changed to customer successfully'));
    }

}
