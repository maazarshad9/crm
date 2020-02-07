@extends('layouts.app', ['title' => __('Callings Management')])

@section('content')
@include('leads.partials.header', ['title' => __('Callings List')])   

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">
                                {{ __('Total Callings') }} ({{ $count  }})
                            </h3>
                            <pre class="mt-2">Showing-{{ $callings->count() }}</pre>
                        </div>
                        <!--<div class="col-4 text-right">
                            <a href="{{ route('leads.create') }}" class="btn btn-sm btn-primary">{{ __('Add Lead') }}</a>
                        </div>-->
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
                                <th scope="col">{{ __('ID') }}</th>
								<th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Contact No') }}</th>
                                <th scope="col">{{ __('City') }}</th>
                                <th scope="col">{{ __('Status') }}</th>
                                <th scope="col">{{ __('Calling Date') }}</th>
                                <th scope="col">{{ __('Calling Time') }}</th>
                                <th scope="col">{{ __('Description') }}</th>
                                <th scope="col">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($callings as $calling)
                            <tr>
                                <td>{{ $calling->primary }}</td>
								<td>{{ $calling->name }}</td>
								<td>
                                    {{ $calling->phone_number }}
                                </td>
								<td>
                                    {{ $calling->city }}
                                </td>
                                <td>
                                    {{ $calling->status }}
                                </td>
                                
                                <td>
                                    {{ $calling->calling_date }}
                                </td>
                                <td>
                                    {{ $calling->calling_time }}
                                </td>
                                <td>{{ $calling->description }}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            
                                          

                                           <form action="{{ route('callings.destroy', $calling) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <a class="dropdown-item" href="{{ route('callings.edit', $calling) }}">{{ __('Edit') }}</a>
                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this Call?") }}') ? this.parentElement.submit() : ''">
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
                    {{ $callings->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>

@include('layouts.footers.auth')
</div>
@endsection