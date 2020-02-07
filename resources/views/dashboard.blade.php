@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
<<<<<<< HEAD
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Sales value</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                            <span class="d-none d-md-block">Month</span>
                                            <span class="d-md-none">M</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                            <span class="d-none d-md-block">Week</span>
                                            <span class="d-md-none">W</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-sales" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                                <h2 class="mb-0">Total orders</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orders" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-8 mb-5 mb-xl-0">
=======
     <div class="container-fluid mt--7">
     @hasanyrole('agent')
        <div class="row">
        <div class="row mt-5" >
            <div class="col-xl-12 mb-5 mb-xl-0">
>>>>>>> df0b4bdc1601e09b0c24b8129f6d56824547c855
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
<<<<<<< HEAD
                                <h3 class="mb-0">Page visits</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
=======
                                <h3 class="mb-0">Project & Commission</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('details', auth()->user()) }}" class="btn btn-sm btn-primary">See all</a>
>>>>>>> df0b4bdc1601e09b0c24b8129f6d56824547c855
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
<<<<<<< HEAD
                                    <th scope="col">Page name</th>
                                    <th scope="col">Visitors</th>
                                    <th scope="col">Unique users</th>
                                    <th scope="col">Bounce rate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        /argon/
                                    </th>
                                    <td>
                                        4,569
                                    </td>
                                    <td>
                                        340
                                    </td>
                                    <td>
                                        <i class="fas fa-arrow-up text-success mr-3"></i> 46,53%
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        /argon/index.html
                                    </th>
                                    <td>
                                        3,985
                                    </td>
                                    <td>
                                        319
                                    </td>
                                    <td>
                                        <i class="fas fa-arrow-down text-warning mr-3"></i> 46,53%
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        /argon/charts.html
                                    </th>
                                    <td>
                                        3,513
                                    </td>
                                    <td>
                                        294
                                    </td>
                                    <td>
                                        <i class="fas fa-arrow-down text-warning mr-3"></i> 36,49%
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        /argon/tables.html
                                    </th>
                                    <td>
                                        2,050
                                    </td>
                                    <td>
                                        147
                                    </td>
                                    <td>
                                        <i class="fas fa-arrow-up text-success mr-3"></i> 50,87%
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        /argon/profile.html
                                    </th>
                                    <td>
                                        1,795
                                    </td>
                                    <td>
                                        190
                                    </td>
                                    <td>
                                        <i class="fas fa-arrow-down text-danger mr-3"></i> 46,53%
                                    </td>
                                </tr>
=======
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
>>>>>>> df0b4bdc1601e09b0c24b8129f6d56824547c855
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
<<<<<<< HEAD
            <div class="col-xl-4">
=======
                </div>
            </div>
        </div>
@endrole
@hasanyrole('super-admin')
        <div class="row">
        <div class="row mt-5" style="width:100%">
            <div class="col-xl-12 mb-5 mb-xl-0">
>>>>>>> df0b4bdc1601e09b0c24b8129f6d56824547c855
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
<<<<<<< HEAD
                                <h3 class="mb-0">Social traffic</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
=======
                                <h3 class="mb-0">Total Projects</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('projects.index') }}" class="btn btn-sm btn-primary">See all</a>
>>>>>>> df0b4bdc1601e09b0c24b8129f6d56824547c855
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
<<<<<<< HEAD
                                    <th scope="col">Referral</th>
                                    <th scope="col">Visitors</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        Facebook
                                    </th>
                                    <td>
                                        1,480
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">60%</span>
                                            <div>
                                                <div class="progress">
                                                <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Facebook
                                    </th>
                                    <td>
                                        5,480
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">70%</span>
                                            <div>
                                                <div class="progress">
                                                <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Google
                                    </th>
                                    <td>
                                        4,807
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">80%</span>
                                            <div>
                                                <div class="progress">
                                                <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Instagram
                                    </th>
                                    <td>
                                        3,678
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">75%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        twitter
                                    </th>
                                    <td>
                                        2,645
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">30%</span>
                                            <div>
                                                <div class="progress">
                                                <div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
=======
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
>>>>>>> df0b4bdc1601e09b0c24b8129f6d56824547c855
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
<<<<<<< HEAD
        </div>

=======
                </div>
            </div>
        </div>
@endrole
>>>>>>> df0b4bdc1601e09b0c24b8129f6d56824547c855
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush