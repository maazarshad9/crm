@extends('layouts.app', ['title' => __('Properties Management')])

@section('content')
@include('properties.partials.header', ['title' => __('Edit Properties')])   

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Properties Management') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('properties.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('properties.update', $property) }}" autocomplete="off">
                        @csrf
                        @method('put')

                        <h6 class="heading-small text-muted mb-4">{{ __('Customer information') }}</h6>
                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Type') }}</label>
                                <input type="text" name="type" id="input-name" class="form-control form-control-alternative{{ $errors->has('type') ? ' is-invalid' : '' }}" placeholder="{{ __('Type') }}" value="{{ old('type', $property->type) }}" required autofocus>

                                @if ($errors->has('type'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('type') }}</strong>
                                </span>
                                @endif
                            </div>
                            
                            <div class="form-group{{ $errors->has('buying_price') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Buying Price') }}</label>
                                <input type="number" name="buying_price" id="input-name" class="form-control form-control-alternative{{ $errors->has('buying_price') ? ' is-invalid' : '' }}" placeholder="{{ __('Buying Price') }}" value="{{ old('buying_price', $property->buying_price) }}" required autofocus>

                                @if ($errors->has('buying_price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('buying_price') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('selling_price') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Buying Price') }}</label>
                                <input type="number" name="selling_price" id="input-name" class="form-control form-control-alternative{{ $errors->has('selling_price') ? ' is-invalid' : '' }}" placeholder="{{ __('Buying Price') }}" value="{{ old('selling_price', $property->selling_price) }}" required autofocus>

                                @if ($errors->has('selling_price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('selling_price') }}</strong>
                                </span>
                                @endif
                            </div>
                            
                            <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Address') }}</label>

                                <textarea name="address"  class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" id="exampleFormControlTextarea1" rows="3">{{ $property->address }}</textarea>


                                @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('City') }}</label>
                                <input type="text" name="city" id="input-name" class="form-control form-control-alternative{{ $errors->has('city') ? ' is-invalid' : '' }}" placeholder="{{ __('City') }}" value="{{ $property->city }}" required autofocus>

                                @if ($errors->has('city'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                                @endif
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
