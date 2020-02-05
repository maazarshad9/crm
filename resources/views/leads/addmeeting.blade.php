@extends('layouts.app', ['title' => __('Meetings Management')])

@section('content')
@include('leads.partials.header', ['title' => __('Add Meeting')])   
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Meetings Management') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('leads.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('lead.storemeeting', $lead) }}" autocomplete="off">
                        @csrf
                        @method('put')

                        <h6 class="heading-small text-muted mb-4">{{ __('Meeting information') }}</h6>
                        <div class="pl-lg-4">
						    <div class="form-group{{ $errors->has('meeting_date') ? ' has-danger' : '' }}">
							<label class="form-control-label" for="input-meeting_date">{{ __('Meeting Date') }}</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input name="meeting_date" class="form-control datepicker {{ $errors->has('meeting_date') ? ' is-invalid' : '' }}" placeholder="{{ __('Meeting Date') }}" placeholder="Select date" type="text" required>
                                    @if ($errors->has('meeting_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('meeting_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
							
							<div class="form-group{{ $errors->has('meeting_time') ? ' has-danger' : '' }}">
                                <div style="position: relative">
								 <label class="form-control-label" for="input-meeting_time">{{ __('Meeting Time') }}</label>
								  <input name="meeting_time" id="input-meeting_time" class="timepicker form-control" type="text" placeholder="{{ __('Meeting Time') }}" required autofocus>
								</div>
                                @if ($errors->has('meeting_time'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('meeting_time') }}</strong>
                                </span>
                                @endif
                            </div>
							
							<div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Description') }}</label>

                                <textarea name="description"  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="exampleFormControlTextarea1" rows="3"></textarea>


                                @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
							
                            <div class="form-group">
                                <input type="hidden" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name', $lead->name) }}">
								
								<input type="hidden" name="phone_number" class="form-control" placeholder="{{ __('Phone Number') }}" value="{{ $lead->phone_number }}" >
								
								<input type="hidden" name="user_id" class="form-control" placeholder="{{ __('Assigned To') }}" value="{{ $lead->user_id }}" >
								<input type="hidden" name="city" class="form-control" placeholder="{{ __('City') }}" value="{{ $lead->city }}" >
								<input type="hidden" name="id" class="form-control" placeholder="{{ __('ID') }}" value="{{ $lead->id }}" >
								<input type="hidden" name="status" class="form-control" placeholder="{{ __('Status') }}" value="meeting" >
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
