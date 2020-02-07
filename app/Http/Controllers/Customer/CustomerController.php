<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Lead;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Lead $model)
    {
        $model = $model->isCustomer(true);

        return view('customers.index', [
        		'leads' => $model->latest()->paginate(10),
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
        return view('customers.create');
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
            'is_customer' => true
        ])->all());

       return redirect()->route('customers.index')->withStatus(__('Customer successfully created.'));
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
    public function edit($id)
    {
        $lead = Lead::findOrFail($id);
        return view('customers.edit', compact('lead'));
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
        $lead = Lead::findOrFail($id);
        $lead->update($request->only('name', 'city', 'phone_number', 'address'));
        return redirect()->route('customers.index')->withStatus(__('Customer successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->delete();
        return redirect()->route('customers.index')->withStatus(__('Customer successfully deleted.'));
    }

   
}
