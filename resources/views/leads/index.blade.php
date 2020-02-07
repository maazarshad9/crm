@extends('layouts.app', ['title' => __('Leads Management')])

@section('content')
@include('leads.partials.header', ['title' => __('Leads List')])   

<div class="container-fluid mt--7">

    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">
                                {{ __('Total Leads') }} ({{ $count  }})
                            </h3>
                            <pre class="mt-2">Showing-{{ $leads->count() }}</pre>
                            <!-- <div class="alert alert-info">{{ Session::get('success') }}</div> -->
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('leads.create') }}" class="btn btn-sm btn-primary">{{ __('Add Lead') }}</a>
                            <a href="{{ route('import') }}" class="btn btn-sm btn-primary">{{ __('Upload_csv') }}</a>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-dark">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Status') }}</th>
                                <th scope="col">{{ __('Phone Number') }}</th>
                                <th scope="col">{{ __('Address') }}</th>
                                <th scope="col">{{ __('Description | Purpose') }}</th>
                                <th scope="col">{{ __('Assigned To') }}</th>
                                <th scope="col">{{ __('Last Date') }}</th>
                                <th scope="col">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leads as $lead)
                            <tr>
                                <td>{{ $lead->name }}</td>
                                <td>
                                    {{ $lead->status }}
                                </td>
                                <td>
                                    {{ $lead->phone_number }}
                                </td>
                                <td>
                                    {{ $lead->address }}
                                </td>
                                <td>
                                    {{ $lead->description }}
                                </td>
                                <td>{{ $lead->user['full_name'] }}</td>
                                <td>{{ $lead->last_date }}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            
                                          @if(Auth::user()->hasRole(['super-admin']))
                                           <a class="dropdown-item" href="{{ route('lead.customer', $lead) }}">{{ __('Change to Customer') }}</a>
                                           <a class="dropdown-item" href="{{ route('lead.setcall', $lead) }}">{{ __('Set Call') }}</a>
                                          <a class="dropdown-item" href="{{ route('lead.addmeeting', $lead) }}">{{ __('Set Meeting') }}</a>
                                          @endif
                                          @if(Auth::user()->hasRole(['agent']))
                                          <a class="dropdown-item" href="{{ route('lead.setcall', $lead) }}">{{ __('Set Call') }}</a>
                                          <a class="dropdown-item" href="{{ route('lead.addmeeting', $lead) }}">{{ __('Set Meeting') }}</a>
                                          @endif
                                        
                                           <form action="{{ route('leads.destroy', $lead) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <a class="dropdown-item" href="{{ route('leads.edit', $lead) }}">{{ __('Edit') }}</a>
                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this lead?") }}') ? this.parentElement.submit() : ''">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>    

                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">
                    {{ $leads->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>

@include('layouts.footers.auth')
</div>
@endsection