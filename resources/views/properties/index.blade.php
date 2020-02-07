@extends('layouts.app', ['title' => __('Properties Management')])

@section('content')
@include('properties.partials.header', ['title' => __('Properties List')])   

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Properties') }} </h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('properties.create') }}" class="btn btn-sm btn-primary">{{ __('Add Property') }}</a>
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
                                <th scope="col">{{ __('Type') }}</th>
                                <th scope="col">{{ __('Address | Location') }}</th>
                                <th scope="col">{{ __('Buying Price') }}</th>
                                <th scope="col">{{ __('Selling Price') }}</th>
                                <th scope="col">{{ __('Sold') }}</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($properties as $property)
                            <tr>
                                <td>{{ $property->type }}</td>

                                <td>
                                    {{ $property->address }}
                                </td>
                                <td>
                                    {{ $property->buying_price }}
                                </td>
                                <td>
                                    {{ $property->selling_price }}
                                </td>
                                <td>
                                    @if($property->sold)
                                    <span class="badge badge-danger" style="color: #fff;">Sold</span>
                                    @else
                                    <span class="badge badge-primary" style="color: #fff;">Available</span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                         <form action="{{ route('properties.destroy', $property) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <a class="dropdown-item" href="{{ route('properties.edit', $property) }}">{{ __('Edit') }}</a>
                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this property?") }}') ? this.parentElement.submit() : ''">
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
                    {{ $properties->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>

@include('layouts.footers.auth')
</div>
@endsection