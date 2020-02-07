@extends('layouts.app', ['title' => __('Meetings Management')])

@section('content')
@include('leads.partials.header', ['title' => __('Meetings List')])   

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">
                                {{ __('Total Meetings') }} ({{ $count  }})
                            </h3>
                            <pre class="mt-2">Showing-{{ $meetings->count() }}</pre>
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
                                <th scope="col">{{ __('Meeting Date') }}</th>
                                <th scope="col">{{ __('Meeting Time') }}</th>
                                <th scope="col">{{ __('Description') }}</th>
                                <th scope="col">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($meetings as $meeting)
                            <tr>
                                <td>{{ $meeting->primary }}</td>
								<td>{{ $meeting->name }}</td>
								<td>
                                    {{ $meeting->phone_number }}
                                </td>
								<td>
                                    {{ $meeting->city }}
                                </td>
                                <td>
                                    {{ $meeting->status }}
                                </td>
                                
                                <td>
                                    {{ $meeting->meeting_date }}
                                </td>
                                <td>
                                    {{ $meeting->meeting_time }}
                                </td>
                                <td>{{ $meeting->description }}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            
                                          

                                           <form action="{{ route('meetings.destroy', $meeting) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <a class="dropdown-item" href="{{ route('meetings.edit', $meeting) }}">{{ __('Edit') }}</a>
                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this meeting?") }}') ? this.parentElement.submit() : ''">
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
                    {{ $meetings->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>

@include('layouts.footers.auth')
</div>
@endsection