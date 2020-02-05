<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Sale;
use Illuminate\Http\Request;

class InstallmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Sale $model)
    {
        $model = $model->with('user', 'customer', 'property')->onInstallment(true)->latest()->paginate(15);
        return view('installments.index', [
            'sales' => $model
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Sale $model)
    {
     $pending_amount = $request->get('total_amount') - $request->get('paid_amount');
     $installment_duration = $request->get('installment_duration');
     $months =  $installment_duration * 12;
     $monthly_payable = $pending_amount/$months;

     $model->create(
        $request->merge([
            'pending_amount' => $pending_amount,
            'user_id' => auth()->user()->id,
            'installment_active' => true,
            'installment_duration' => $installment_duration,
            'monthly_payable' => $monthly_payable,
        ])->all());

     Property::findOrFail($request->get('property_id'))->update([
        'invoicing' => true
    ]);

     return back();
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

    public function makePayment($id)
    {
        $sale = Sale::findOrFail($id);
        return view('installments.make-payment', compact('sale'));
    }

    public function storePayment(Request $request, $id)
    {
        $sale = Sale::findOrFail($id);

        $paid_amount = $sale->paid_amount + $request->get('paid_amount');

        $sale->update(['paid_amount' => $paid_amount]);
        
        return redirect()->route('installments.index')->withStatus(__('Installment Paid.'));
    }
}
