<?php

namespace App\Http\Controllers\Lead;

use App\Http\Controllers\Controller;
use App\Lead;
use App\Meeting;
use App\Calling;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Lead $model)
    {

        $model = $model->isCustomer(false);

        if (!auth()->user()->hasRole(['super-admin'])) {
            $model = $model->where('created_by', auth()->user()->id);
        }


        // check if the role is agent
        // if agent then list his own leads
        // if super admin then continue


       

        
        return view('leads.index', [
            'leads' => $model->where('last_date','>', Carbon::now())->orWhere('status', '!=' , 'processing')->paginate(15),
            'users' => $model->where('last_date','>', Carbon::now())->orWhere('status', '!=' , 'processing')->groupBy('user_id')->get(),
           
            'count' => $model->count()
        ]);
    }
    public function expire(Lead $model)
    {

        $model = $model->isCustomer(false);

        if (!auth()->user()->hasRole(['super-admin'])) {
            $model = $model->where('created_by', auth()->user()->id);
        }


        // check if the role is agent
        // if agent then list his own leads
        // if super admin then continue
        
        return view('leads.expire', [
            'leads' => $model->where([['last_date','<', Carbon::now()],  ['status', '=', 'processing']])->paginate(15),
            'users' => $model->where('last_date','>', Carbon::now())->orWhere('status', '!=' , 'processing')->groupBy('user_id')->get(),
           
            'count' => $model->count()
        ]);
    }
    public function search(Lead $model, Request $request)
    {

        $model = $model->isCustomer(false);

        if (!auth()->user()->hasRole(['super-admin'])) {
            $model = $model->where('created_by', auth()->user()->id);
        }


        // check if the role is agent
        // if agent then list his own leads
        // if super admin then continue
        $time = strtotime($request->input('from'));
        $time1 = strtotime($request->input('to'));
        $from = date('Y-m-d',$time);
        $to = date('Y-m-d',$time1);
 return view('leads.search', [
            'leads' => $model->where([['user_id','=', $request->input('user_id')],['last_date','>', $from],['last_date','<', $to]])->paginate(15),
            'users' => $model->where('last_date','>', Carbon::now())->orWhere('status', '!=' , 'processing')->groupBy('user_id')->get(),

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
        return view('leads.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Lead $model)
    {
       $model->create(
        $request->merge([
            'last_date' => Carbon::parse($request->last_date),
            'created_by' => auth()->user()->id
        ])->all());

       return redirect()->route('leads.index')->withStatus(__('Lead successfully created.'));
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
    public function edit(Lead $lead)
    {
        if (!auth()->user()->hasRole(['super-admin']) && $lead->created_by !== auth()->user()->id) {
            abort(404);
        }

        $users = User::get();
        return view('leads.edit', compact('lead', 'users'));
    }
    
    public function addmeeting(Lead $lead)
    {
        // if (!auth()->user()->hasRole(['super-admin']) && $lead->created_by !== auth()->user()->id) {
        //     abort(404);
        // }

        $users = User::get();
        return view('leads.addmeeting', compact('lead', 'users'));
    }
	
	 public function storemeeting(Request $request, Lead $lead, Meeting $model)
    {
       
		/*$lead->update(
             $request->merge([
             'updated_by' => auth()->user()->id,
			 'status' => 'meeting'
        ])->all());*/
		
		$lead->where('id', $request->id)->update(['status' => 'meeting']);
		
		/*DB::table('leads')
			->where("leads.id", '=',  $lead)
			->update(['leads.status'=> 'meeting']);*/
		
		$model->create(
        $request->merge([
		    'meeting_date' => Carbon::parse($request->meeting_date),
            'created_by' => auth()->user()->id
        ])->all());

        return redirect()->route('leads.index')->withStatus(__('Meeting successfully created.'));
   }
   
   public function setcall(Lead $lead)
    {
        // if (!auth()->user()->hasRole(['super-admin']) && $lead->created_by !== auth()->user()->id) {
        //     abort(404);
        // }
        $users = User::get();
        return view('leads.setcall', compact('lead', 'users'));
    }
    public function setagentcall(Lead $lead)
    {
        dd('hello');
    }
    
    
	
	public function storecalling(Request $request, Lead $lead, Calling $model)
    {
		
		$lead->where('id', $request->id)->update(['status' => 'calling']);
		
		/*DB::table('leads')
			->where("leads.id", '=',  $lead)
			->update(['leads.status'=> 'meeting']);*/
		
		$model->create(
        $request->merge([
		    'calling_date' => Carbon::parse($request->calling_date),
            'created_by' => auth()->user()->id
        ])->all());

        return redirect()->route('leads.index')->withStatus(__('Set calling successfully created.'));
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead)
    {
        $lead->update(
             $request->merge([
            'updated_by' => auth()->user()->id
        ])->all());

        return redirect()->route('leads.index')->withStatus(__('Lead successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        $lead->delete();
        return redirect()->route('leads.index')->withStatus(__('Lead successfully deleted.'));
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
