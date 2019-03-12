@extends("layouts.app")
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				@include('admin.sitebar')
			</div>
			<div class="col-md-9">
				<div class="card vehicle_detail">
					<div class="card-header">Vehicle detail</div>
					<div class="card-body">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</div>
				</div>
				<div class="card">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
					  <li class="nav-item">
					    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#repair_history" role="tab" aria-controls="home" aria-selected="true">Repair history</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" id="fuel-entry-tab" data-toggle="tab" href="#fuel_entry_history" role="tab" aria-controls="Fuel entry history" aria-selected="false">Fuel entry history</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" id="trip-history-tab" data-toggle="tab" href="#trip_history" role="tab" aria-controls="trip-history" aria-selected="false">Trip history</a>
					  </li>
					</ul>
					<div class="tab-content" id="myTabContent">
					  <div class="tab-pane fade show active" id="repair_history" role="tabpanel" aria-labelledby="home-tab">
			  			<table class="table table-bordered">
								<thead>
									<tr>
										<th>ID</th>
										<th>Repair type</th>
										<th>Vehicle</th>
										<th>Vendor</th>
										<th>Invoice Number</th>
										<th>Date</th>
									</tr>
								</thead>			
								<tbody>
									@foreach($repair_history as $repair)
										<tr>
											<td>{{ $repair->id }}</td>
											<td>{{ $repair->repair_type }}</td>
											<td>{{ $repair->Vehicle->make }}</td>
											<td>{{ $repair->Vendor->name }}</td>
											<td>{{ $repair->invoice_number }}</td>
											<td>{{ $repair->created_at->format('d-M-Y') }}</td>
										</tr>
									@endforeach
								</tbody>					
							</table>
					  		
					  </div>
					  <div class="tab-pane fade" id="fuel_entry_history" role="tabpanel" aria-labelledby="fuel-entry-tab">
					  	<table class="table table-bordered">
								<thead>
									<tr>
										<th>ID</th>
										<th>Vehicle</th>
										<th>Vendor</th>
										<th>Payment type</th>
										<th>Total Amount</th>
										<th>Date</th>
									</tr>
								</thead>			
								<tbody>
									@foreach($fuels as $fuel)
										<tr>
											<td>{{ $fuel->id }}</td>
											<td>{{ $fuel->Vehicle->make }}</td>
											<td>{{ $fuel->Vendor->name }}</td>
											<td>{{ $fuel->payment_type }}</td>
											<td>$ {{ $fuel->total_amount }}</td>
											<td>{{ $fuel->created_at->format('d-M-Y') }}
										</tr>
									@endforeach
								</tbody>					
							</table>
					  </div>
					  <div class="tab-pane fade" id="trip_history" role="tabpanel" aria-labelledby="trip-history-tab">
					  	<table class="table table-bordered">
								<thead>
									<tr>
										<th>ID</th>
										<th>Vehicle</th>
										<th>Departure Location</th>
										<th>To Location</th>
										<th>Trip start date</th>
										<th>Trip return date</th>
										
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
											
										</tr>
									@endforeach
								</tbody>					
							</table>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection