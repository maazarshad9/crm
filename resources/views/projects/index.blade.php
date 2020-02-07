@extends('layouts.app', ['title' => __('Projects Management')])

@section('content')
@include('projects.partials.header', ['title' => __('Projects List')])   

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Total Projects -') }}  </h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('projects.create') }}" class="btn btn-sm btn-primary">{{ __('Add Project') }}</a>
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
                                <th scope="col">{{ __('Project Name') }}</th>
                                <th scope="col">{{ __('Customer') }}</th>
                                <th scope="col">{{ __('Project Created By') }}</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr>
                                <td>
                                    <a href="{{ route('projects.show', $project) }}">{{ $project->name }}</a>
                                </td>
                         
                                <td>
                                    {{ $project->customer->name }}
                                </td>
                                <td>
                                    {{ $project->owner['full_name'] }}
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            
                                           <a class="dropdown-item" href="{{ route('lead.customer', $project) }}">{{ __('Change to customer') }}</a>

                                           <form action="{{ route('customers.destroy', $project) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <a class="dropdown-item" href="{{ route('customers.edit', $project) }}">{{ __('Edit') }}</a>
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
                    {{ $projects->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>

@include('layouts.footers.auth')
</div>
@endsection