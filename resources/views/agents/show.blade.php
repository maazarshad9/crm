@extends('layouts.app', ['title' => __('User Management')])

@section('content')
@include('users.partials.header', ['title' => __('Details')])   

<div class="container-fluid mt--7">
	<div class="row">
		<div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
			<div class="card card-profile shadow">
				<div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
					<div class="d-flex justify-content-center">
						<h4>Project Statistics</h4><br>
				
					</div>
				</div>
				<div class="card-body pt-0 pt-md-4">

					<div class="row">
						<div class="col">
							<div class="card-profile-stats d-flex justify-content-center mt-md-5">
							
								<div>
									<span class="heading">{{ $user->projects->count() }}</span>
									<span class="description">{{ __('Total Projects') }}</span>
								</div>
								<div>
									<span class="heading">
										{{ $user->getTotalCommission() }}
									</span>
									<span class="description">{{ __('Total Commission') }}</span>
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
					<h3>{{$user->getFullNameAttribute()}}</h3>
				</div>
				<div class="card-body">
					@foreach($user->projects as $project)
					<div class="row align-items-center">
						<div class="col-auto">
							<span>Project Customer :</span>
						</div>
						<div class="col ml--2">
							<h4 class="mb-0">
								<a href="#!">{{ $project->customer->name }}</a>
							</h4>
						</div>
					</div>
					<div class="col-auto">
						<div class="table-responsive">
							<table class="table align-items-center">
								<tbody>
									<tr>
										<th scope="row">
											<div class="media align-items-center">
												<div class="media-body">
													<span class="mb-0 text-sm">Booking Commission</span>
												</div>
											</div>
										</th>
										<td>
											{{ $project->pivot->booking_commission }}
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
											{{ $project->pivot->confirmation_commission }}
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
											{{ $project->pivot->allocation_commission }}
										</td>
									</tr>
									<tr>
										<th>Total Commission</th>
										<td> 
											{{ $project->pivot->booking_commission + $project->pivot->confirmation_commission + $project->pivot->allocation_commission }}
										</td>
									</tr>
								</tbody>
							</table>

						</div>
					</div>
					<br>
					<hr>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
