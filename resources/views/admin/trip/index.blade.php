@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				@include('admin.sitebar')
			</div>
			<div class="col-md-9">
				<div class="card">
					<div class="card-header">All Trips <a href="{{ route('admin.trip.create') }}" class="float-right">Add new trip record</a></div>
					<div class="card-body">
						@if(isset($trips))
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>ID</th>
										<th>Vehicle</th>
										<th>Departure Location</th>
										<th>To Location</th>
										<th>Trip start date</th>
										<th>Trip return date</th>
										<th>Actions</th>
									</tr>
								</thead>			
								<tbody>
									@foreach($trips as $trip)
										<tr>
											<td>{{ $trip->id }}</td>
											<td>{{ $trip->Vehicle->make }}</td>
											<td>{{ $trip->departure_locataion }}</td>
											<td>{{ $trip->to_location }}</td>
											<td>{{ $trip->trip_start_date }}</td>
											<td>{{ $trip->trip_end_date }}</td>
											<td>
												<div class="btn-group" role="group" aria-label="Vendor Actions">
													<a href="{{ route('admin.trip.edit',$trip) }}" class="btn btn-secondary">Edit</a>

													<a href="{{ route('admin.trip.destroy',$trip) }}"  class="btn btn-danger">Delete</a>
													<a href=""  class="btn btn-primary">Show</a>
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