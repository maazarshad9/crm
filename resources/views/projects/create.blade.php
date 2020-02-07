@extends('layouts.app', ['title' => __('Projects Management')])

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css">
@endpush
@section('content')
@include('users.partials.header', ['title' => __('Add New Project')])   

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Projects Management') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('projects.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('projects.store') }}" autocomplete="off">
                        @csrf

                        <h6 class="heading-small text-muted mb-4">{{ __('Project information') }}</h6>
                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Project Name') }}</label>
                                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="input-name">{{ __('Customer') }}</label>
                                <select name="customer_id" class="form-control" data-toggle="select" title="Simple select" data-placeholder="Select user" required>
                                    <option value="" disabled>Select Customer</option>
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ ucwords( $user->name ) }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group{{ $errors->has('total_price') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('total_price') }}</label>
                                <input type="number" name="total_price" id="input-name" class="form-control form-control-alternative{{ $errors->has('total_price') ? ' is-invalid' : '' }}" placeholder="{{ __('total_price') }}" value="{{ old('total_price') }}" required autofocus>

                                @if ($errors->has('total_price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('total_price') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('booking_price') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('booking_price') }}</label>
                                <input type="number" name="booking_price" id="input-name" class="form-control form-control-alternative{{ $errors->has('booking_price') ? ' is-invalid' : '' }}" placeholder="{{ __('Cost') }}" value="{{ old('booking_price') }}" required autofocus>

                                @if ($errors->has('booking_price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('booking_price') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('confirmation_price') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('confirmation_price') }}</label>
                                <input type="number" name="confirmation_price" id="input-name" class="form-control form-control-alternative{{ $errors->has('confirmation_price') ? ' is-invalid' : '' }}" placeholder="{{ __('Cost') }}" value="{{ old('confirmation_price') }}" required autofocus>

                                @if ($errors->has('confirmation_price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('confirmation_price') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('allocation_price') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('allocation_price') }}</label>
                                <input type="number" name="allocation_price" id="input-name" class="form-control form-control-alternative{{ $errors->has('allocation_price') ? ' is-invalid' : '' }}" placeholder="{{ __('Cost') }}" value="{{ old('allocation_price') }}" required autofocus>

                                @if ($errors->has('allocation_price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('allocation_price') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input name="last_date" class="form-control datepicker {{ $errors->has('last_date') ? ' is-invalid' : '' }}" placeholder="{{ __('Start Date') }}" placeholder="Select date" type="text" value="" required>
                                            @if ($errors->has('last_date'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('last_date') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input name="last_date" class="form-control datepicker {{ $errors->has('last_date') ? ' is-invalid' : '' }}" placeholder="{{ __('Last Date') }}" placeholder="Select date" type="text" value="" required>
                                            @if ($errors->has('last_date'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('last_date') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
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

@push('js')
<script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
@endpush