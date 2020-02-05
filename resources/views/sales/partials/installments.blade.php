<form method="post" action="{{ route('installments.store') }}" autocomplete="off">
    @csrf

    <h6 class="heading-small text-muted mb-4">{{ __('Sale Via Installments') }}</h6>
    <div class="pl-lg-4">
        <div class="form-group">
            <label class="form-control-label" for="input-name">{{ __('Property') }}</label>
            <select name="property_id" class="form-control" data-toggle="select" title="Simple select" data-placeholder="Select user" required>
                <option value="" disabled>Select Property</option>
                @foreach($properties as $property)
                <option value="{{ $property->id }}">
                    {{ ucwords( $property->address ) }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="form-control-label" for="input-name">{{ __('Customer') }}</label>
            <select name="lead_id" class="form-control" data-toggle="select" title="Simple select" data-placeholder="Select user" required>
                <option value="" disabled>Select Customer</option>
                @foreach($customers as $customer)
                <option value="{{ $customer->id }}">
                    {{ ucwords( $customer->name ) }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="form-control-label" for="input-name">{{ __('Total Payment') }}</label>
            <input type="number" name="total_amount" id="input-name" class="form-control form-control-alternative"  placeholder="{{ __('Total Payment') }}" required autofocus>
        </div>

        <div class="form-group">
            <label class="form-control-label" for="input-name">{{ __('Paid') }}</label>
            <input type="number" name="paid_amount" id="input-name" class="form-control form-control-alternative"  placeholder="{{ __('Advance Payment') }}" required autofocus>
        </div>


        <div class="form-group">
            <label class="form-control-label" for="input-name">{{ __('Payment Recurrence Month') }}</label>
            <small>The customer will be billed after the selected months, the installment can be paid after these months</small>
            <select name="payment_recurrence" class="form-control" data-toggle="select" title="Simple select" data-placeholder="Select user" required>
                <option value="" disabled>Select Payment Recurrence</option>
                <option value="1">One Month</option>
                <option value="2">Two Months</option>
                <option value="3">Three Months</option>
                <option value="4">Four Months</option>
                <option value="5">Five Months</option>
                <option value="6">Six Months</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-control-label" for="input-name">{{ __('Installment Duration | Plan') }}</label>
            <small>
               {{ __(' This is the installment plan and duration in which the customers will have to pay the entire amount') }}
            </small>
            <select name="installment_duration" class="form-control" data-toggle="select" title="Simple select" data-placeholder="Select user" required>
                <option value="" disabled>Select Plan</option>
                <option value="1">1 Year</option>
                <option value="2">2 Years</option>
                <option value="3">3 Years</option>
                <option value="4">4 Years</option>
                <option value="5">5 Years</option>
                <option value="6">6 Years</option>
                <option value="7">7 Years</option>
            </select>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
        </div>
    </div>
</form>