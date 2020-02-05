@extends('layouts.app', ['title' => __('Sales Management')])

@section('content')
@include('customers.partials.header', ['title' => __('Sales List')])   

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Sales List') }} </h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('sales.create') }}" class="btn btn-sm btn-primary">{{ __('New Sale') }}</a>
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
                                <th scope="col">{{ __('Customer') }}</th>
                                <th scope="col">{{ __('Address') }}</th>
                                <th scope="col">{{ __('Total Amount') }}</th>
                                <th scope="col">{{ __('Paid Amount') }}</th>
                                <th scope="col">{{ __('Pending Amount') }}</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                            <tr>
                                <td>{{ $sale->customer->name }}</td>
                                <td>{{ $sale->property->address }}</td>
                                <td>{{ number_format($sale->total_amount) }}</td>
                                <td>{{ number_format($sale->paid_amount) }}</td>
                                <td>{{ number_format($sale->pending_amount) }}</td>
        
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            

                                           <form action="{{ route('sales.destroy', $sale) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <a class="dropdown-item" href="{{ route('sales.edit', $sale) }}">{{ __('Edit') }}</a>
                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this sale?") }}') ? this.parentElement.submit() : ''">
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
                    {{ $sales->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>

@include('layouts.footers.auth')
</div>
@endsection