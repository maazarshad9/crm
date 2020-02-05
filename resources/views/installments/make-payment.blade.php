@extends('layouts.app', ['title' => __('Make Payment')])

@section('content')
@include('properties.partials.header', ['title' => __('Make Payment')])   

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                           <h3 class="mb-0">Make Payment for {{ $sale->customer->name }}</h3>
                       </div>
                       <div class="col-4 text-right">
                        <a href="{{ route('installments.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('installment_payment.store', $sale->id) }}" autocomplete="off">
                    @csrf

                    <h6 class="heading-small text-muted">{{ __('Pay installments') }}</h6>
                    <h6 class="heading-small text-muted">Total Amount - {{ $sale->total_amount }}</h6>
                    <h6 class="heading-small text-muted">Paid Amount - {{ $sale->paid_amount }}</h6>
                    <h6 class="heading-small text-muted  mb-4">Pending Amount - {{ $sale->pending_amount }}</h6>
                    <div class="pl-lg-4">

                        <div class="form-group">
                            <label class="form-control-label" for="input-name">{{ __('Paid Payment') }}</label>
                            <input type="number" name="paid_amount" id="input-name" class="form-control form-control-alternative"  placeholder="{{ __('Paid Payment') }}" required autofocus>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('layouts.footers.auth')
</div>
@endsection

