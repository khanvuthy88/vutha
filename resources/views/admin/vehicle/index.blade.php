@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				@include('admin.sitebar')
			</div>
			<div class="col-md-9">
				<div class="card">
					<div class="card-header">All Vehicles <a href="{{ route('admin.vehicle.create') }}" class="float-right">Create New vehicle</a></div>
					<div class="card-body">
						@if(isset($vehicles))
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>ID</th>
										<th>User</th>
										<th>Make</th>
										<th>Model</th>
										<th>Plat Number</th>
										<th>Address</th>
										<th>Actions</th>
									</tr>
								</thead>			
								<tbody>
									@foreach($vehicles as $vehicle)
										<tr>
											<td>{{ $vehicle->id }}</td>
											<td>{{ $vehicle->User->name }}</td>
											<td>{{ $vehicle->make }}</td>
											<td>{{ $vehicle->model }}</td>
											<td>{{ $vehicle->plat_number }}</td>
											<td>{{ $vehicle->Location->name }}</td>
											<td>
												<div class="btn-group" role="group" aria-label="Vendor Actions">
													<a href="{{ route('admin.vehicle.edit',$vehicle) }}" class="btn btn-secondary">Edit</a>

													<a href="{{ route('admin.vehicle.destroy',$vehicle) }}"  class="btn btn-danger">Delete</a>
													<a href="{{ route('admin.vehicle.show',$vehicle) }}"  class="btn btn-primary">Show</a>
												</div>

											</td>
										</tr>
									@endforeach
								</tbody>					
							</table>
						@else
							<p>There are no user yet</p>
						@endif
					</div>
				</div>
			</divc>
		</div>
	</div>
@endsection