@extends('layouts.app', ['title' => __('Agent Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Edit Agent')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Agent Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('agents.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('agents.update', $user) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Agent information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('first_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('First Name') }}</label>
                                    <input type="text" name="first_name" id="input-name" class="form-control form-control-alternative{{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="{{ __('First Name') }}" value="{{ old('first_name', $user->first_name) }}" required autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('last_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Last Name') }}</label>
                                    <input type="text" name="last_name" id="input-name" class="form-control form-control-alternative{{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Last Name') }}" value="{{ old('last_name', $user->last_name) }}" required autofocus>

                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('phone_number') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Phone Number') }}</label>
                                    <input type="number" name="phone_number" id="input-name" class="form-control form-control-alternative{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Phone Number') }}" value="{{ old('phone_number', $user->phone_number) }}" required autofocus>

                                    @if ($errors->has('phone_number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="">
                                    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm Password') }}" value="">
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