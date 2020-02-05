@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
@include('users.partials.header', [
    'title' => __('Project') . ' '. $project->name,
    'description' => __('This is project page. You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
    'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                            <div class="d-flex justify-content-center">
                                <h4>Project Statistics</h4>

                            </div>
                            <div class="d-flex justify-content-center">
                                        <h4>
                                            Customer: {{ $project->customer->name }}
                                        </h4>
                                    </div>
                        </div>
                    <div class="card-body pt-0 pt-md-4">
                        
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    
                                    <div>
                                        <span class="heading">{{ $project->total_price }}</span>
                                        <span class="description">{{ __('Budget') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">{{ $totalComission }}</span>
                                        <span class="description">{{ __('Total Commission') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">{{ $project->total_price - $totalComission }}</span>
                                        <span class="description">{{ __('Profit') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Project Details') }}</h3>
                        </div>
                        <div class="float-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agentModal">
                              Add new agent
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="agentModal" tabindex="-1" role="dialog" aria-labelledby="agentModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="agentModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                 <form method="post" action="{{ route('project.agent.store', $project) }}" autocomplete="off">
                                    @csrf

                                    <h6 class="heading-small text-muted mb-4">{{ __('Project information') }}</h6>
                                    <div class="pl-lg-4">
                                       <div class="form-group">

                                        <label class="form-control-label" for="input-name">{{ __('Agent') }}</label>
                                        <select name="member_id" class="form-control" data-toggle="select" title="Simple select" data-placeholder="Select Agent" required>
                                            <option value="" disabled>Select Agent</option>
                                            @foreach($users as $user)
                                            <option value="{{ $user->id }}">
                                                {{ ucwords( $user->full_name ) }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
<div class="row">
    <div class="col col-sm-6">
<label class="form-control-label" for="input-name">{{ __('Size') }}</label>
<select name="size" class="form-control" data-toggle="select" title="Simple select" data-placeholder="Select Agent" required>
    <option value="" disabled>Select Size</option>

    <option value="5 Marla">
        5 Marla
    </option>
    <option value="7 Marla">
        7 Marla
    </option>
    <option value="10 Marla">
        10 Marla
    </option>
    <option value="12 Marla">
        12 Marla
    </option>
    <option value="1 Kanal">
        1 Kanal
    </option>
</select>
</div>
<div class="col col-sm-6">
<label class="form-control-label" for="input-name">{{ __('Category') }}</label>
<select name="category" class="form-control" data-toggle="select" title="Simple select" data-placeholder="Select Agent" required>
    <option value="" disabled>Select Category</option>
    <option value="Plot">
Plot
    </option>
    <option value="Commercial">
Commercial
    </option>
    <option value="Residential">
Residential
    </option>
    <option value="Villa">
Villa
    </option>

</select>
</div>
</div></div>
                                    <div class="form-group{{ $errors->has('booking_commission') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Booking commission') }}</label>
                                        <input type="number" name="booking_commission" id="input-name" class="form-control form-control-alternative{{ $errors->has('booking_commission') ? ' is-invalid' : '' }}" placeholder="{{ __('Booking commission') }}" value="{{ old('booking_commission') }}" autofocus>

                                        @if ($errors->has('booking_commission'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('booking_commission') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('allocation_commission') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Allocation commission') }}</label>
                                        <input type="number" name="allocation_commission" id="input-name" class="form-control form-control-alternative{{ $errors->has('allocation_commission') ? ' is-invalid' : '' }}" placeholder="{{ __('Allocation commission') }}" value="{{ old('allocation_commission') }}" autofocus>

                                        @if ($errors->has('allocation_commission'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('allocation_commission') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('confirmation_commission') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Confirmation commission') }}</label>
                                        <input type="number" name="confirmation_commission" id="input-name" class="form-control form-control-alternative{{ $errors->has('confirmation_commission') ? ' is-invalid' : '' }}" placeholder="{{ __('Confirmation commission') }}" value="{{ old('confirmation_commission') }}" autofocus>

                                        @if ($errors->has('confirmation_commission'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('confirmation_commission') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        @foreach($project->members as $member)
        <div class="row align-items-center">
            <div class="col-auto">
               <a href="#" class="avatar avatar-xl rounded-circle">
                <img src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg" class="rounded-circle">
            </a>
        </div>
        <div class="col ml--2">
            <h4 class="mb-0">
                <a href="#!">{{ $member->full_name }}</a>
                <!-- <a href="#!">{{ $member->pivot->size }}</a> -->
            </h4>
        </div>
        <div class="col-auto">
            <div class="table-responsive">
                <table class="table align-items-center">
                    <tbody>
                    <tr>
                            <th scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <span class="mb-0 text-sm">Size</span>
                                    </div>
                                </div>
                            </th>
                            <td>
                                @if($member->pivot->size)
                                <button type="button" class="btn btn-sm btn-primary" title="Booking" disabled>{{ $member->pivot->size }}</button> 
                              
                                    @endif
                                </td>
                            </tr>
    
                            <tr>
                            <th scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <span class="mb-0 text-sm">Category</span>
                                    </div>
                                </div>
                            </th>
                            <td>
                                @if($member->pivot->category)
                                <button type="button" class="btn btn-sm btn-primary" title="Booking" disabled>{{ $member->pivot->category }}</button> 
                              
                                    @endif
                                </td>
                            </tr>
                        
                        <tr>
                            <th scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <span class="mb-0 text-sm">Booking Commission</span>
                                    </div>
                                </div>
                            </th>
                            <td>
                                @if($member->pivot->booking_commission)
                                <button type="button" class="btn btn-sm btn-primary" title="Booking" disabled>{{ $member->pivot->booking_commission }}</button> 
                                @else
                                @include('projects.partials.booking', [
                                    'project' => $project,
                                    'agent' => $member
                                    ])
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="mb-0 text-sm">Confirmation Commission</span>
                                        </div>
                                    </div>
                                </th>
                                <td>
                                    @if($member->pivot->confirmation_commission)
                                    <button type="button" class="btn btn-sm btn-primary" title="Confirmation" disabled>{{ $member->pivot->confirmation_commission }}</button> 
                                    @else
                                    @include('projects.partials.confirmation', [
                                        'project' => $project,
                                        'agent' => $member
                                        ])
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <span class="mb-0 text-sm">Allocation Commission</span>
                                            </div>
                                        </div>
                                    </th>
                                    <td>
                                        @if($member->pivot->allocation_commission)
                                        <button type="button" class="btn btn-sm btn-primary" title="Allocation" disabled>{{ $member->pivot->allocation_commission }}</button> 
                                        @else
                                        @include('projects.partials.allocation', [
                                            'project' => $project,
                                            'agent' => $member
                                            ])
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Total Commission</th>
                                        <td><button type="button" class="btn btn-sm btn-primary" title="Booking" disabled>{{ $member->pivot->booking_commission + $member->pivot->confirmation_commission + $member->pivot->allocation_commission }}</button> </td>
                                    </tr>
                                    <tr>
                                   <td><a href="{{route('invoice')}}"> <button class="btn btn-sm btn-primary">Get PDF</button></a></td>
                                 </tr>
                                    
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <br>
                <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>

@include('layouts.footers.auth')
</div>
@endsection