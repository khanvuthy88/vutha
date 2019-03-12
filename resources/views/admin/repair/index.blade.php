@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				@include('admin.sitebar')
			</div>
			<div class="col-md-9">
				<div class="card">
					<div class="card-header">All Repairs <a href="{{ route('admin.repair.create') }}" class="float-right">Create New repair</a></div>
					<div class="card-body">
						@if(isset($repairs))
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>ID</th>
										<th>Repair type</th>
										<th>Vehicle</th>
										<th>Vendor</th>
										<th>Invoice Number</th>
										<th>Actions</th>
									</tr>
								</thead>			
								<tbody>
									@foreach($repairs as $repair)
										<tr>
											<td>{{ $repair->id }}</td>
											<td>{{ $repair->repair_type }}</td>
											<td>{{ $repair->Vehicle->make }}</td>
											<td>{{ $repair->Vendor->name }}</td>
											<td>{{ $repair->invoice_number }}</td>
											<td>
												<div class="btn-group" role="group" aria-label="Vendor Actions">
													<a href="{{ route('admin.repair.edit',$repair) }}" class="btn btn-secondary">Edit</a>

													<a href="{{ route('admin.repair.destroy',$repair) }}"  class="btn btn-danger">Delete</a>
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