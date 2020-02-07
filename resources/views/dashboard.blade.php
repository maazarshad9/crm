@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
     <div class="container-fluid mt--7">
     @hasanyrole('agent')
        <div class="row">
        <div class="row mt-5" >
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Project & Commission</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('details', auth()->user()) }}" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Project Name</th>
                                    <th scope="col">Project Customer</th>
                                    <th scope="col">Owner Name</th>
                                    <th scope="col">Booking Commission</th>
                                    <th scope="col">Confirmation Commission</th>
                                    <th scope="col">Allocation Commission</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($user->projects as $project)
				
                                <tr>
                                    <th scope="row">
                                    {{ $project->name }}
                                    </th>
                                    <td>
                                    {{ $project->customer->name }}
                                    </td>
                                    <td>
                                    {{$project->getowner($project->owner_id)}}
                                    </td>
                                    <td>
                                    {{ $project->pivot->booking_commission }}
                                    </td>
                                    <td>
                                    {{ $project->pivot->confirmation_commission }}
                                    </td>
                                    <td>
                                    {{ $project->pivot->allocation_commission }}
                                    </td>
                                    <td>
                                    {{ $project->date()->format('m/d/Y') }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
@endrole
@hasanyrole('super-admin')
        <div class="row">
        <div class="row mt-5" style="width:100%">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Total Projects</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('projects.index') }}" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Project Name</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Total Paid Commission</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($projects as $project)
				
                                <tr>
                                    <th scope="row">
                                    <a href="{{ route('projects.show', $project) }}">          {{ $project->name }}
                                    </th>
                                    <td>
                                    {{ $project->customer->name }}
                                    </td>
                                    <td>
                                    {{$project->total_price}}
                                    </td>
                                    
                                    <td>
                                    {{ $project->gettotal($project->id) }}
                                    </td>
                                    <td>
                                    {{ $project->created_at->toDatestring() }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
@endrole
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush