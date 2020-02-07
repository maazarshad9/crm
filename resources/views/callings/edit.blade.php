@extends('layouts.app', ['title' => __('Callings Management')])

@section('content')
@include('leads.partials.header', ['title' => __('Edit Callings')])   
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Callings Management') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('callings.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('callings.update', $calling) }}" autocomplete="off">
                        @csrf
                        @method('put')
                        <h6 class="heading-small text-muted mb-4">{{ __('Calling information') }}</h6>
                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $calling->name) }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('City') }}</label>
                                <input type="text" name="city" id="input-name" class="form-control form-control-alternative{{ $errors->has('city') ? ' is-invalid' : '' }}" placeholder="{{ __('City') }}" value="{{ $calling->city }}" required autofocus>

                                @if ($errors->has('city'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('phone_number') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Phone Number') }}</label>
                                <input type="number" name="phone_number" id="input-name" class="form-control form-control-alternative{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Phone Number') }}" value="{{ $calling->phone_number }}" required autofocus>

                                @if ($errors->has('phone_number'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                </span>
                                @endif
                            </div>
							
							<div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input name="calling_date" class="form-control datepicker {{ $errors->has('calling_date') ? ' is-invalid' : '' }}" placeholder="{{ __('Calling Date') }}" placeholder="Select date" type="text" value="{{ Carbon\Carbon::parse($calling->calling_date) }}" required>
                                    @if ($errors->has('calling_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('calling_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
							
							<div class="form-group{{ $errors->has('calling_time') ? ' has-danger' : '' }}">
                                <div style="position: relative">
								 <label class="form-control-label" for="input-calling_time">{{ __('Calling Time') }}</label>
								  <input name="calling_time" id="input-calling_time" class="timepicker form-control" type="text" placeholder="{{ __('Calling Time') }}" value="{{ $calling->calling_time }}" required autofocus>
								</div>
                                @if ($errors->has('calling_time'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('calling_time') }}</strong>
                                </span>
                                @endif
                            </div>


                            <div class="form-group">
                                <label class="form-control-label" for="input-name">{{ __('Assigned To') }}</label>
                                <select name="user_id" class="form-control" data-toggle="select" title="Simple select" data-placeholder="Select user" required>
                                    <option value="" disabled>Select User</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $user->id === $calling->user_id ? 'selected' : ''}}>{{ $user->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Description') }}</label>

                                <textarea name="description"  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="exampleFormControlTextarea1" rows="3">{{ $calling->description }}</textarea>


                                @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
    $('.timepicker').datetimepicker({
        format: 'HH:mm:ss'
    }); 
</script>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
@endpush