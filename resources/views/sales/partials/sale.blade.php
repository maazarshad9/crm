<form method="post" action="{{ route('sales.store') }}" autocomplete="off">
    @csrf

    <h6 class="heading-small text-muted mb-4">{{ __('One Time Sale') }}</h6>
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
            <label class="form-control-label" for="input-name">{{ __('Paid Payment') }}</label>
            <input type="number" name="paid_amount" id="input-name" class="form-control form-control-alternative"  placeholder="{{ __('Paid Payment') }}" required autofocus>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
        </div>
    </div>
</form>