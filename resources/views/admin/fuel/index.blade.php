@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				@include('admin.sitebar')
			</div>
			<div class="col-md-9">
				<div class="card">
					<div class="card-header">All Fuels <a href="{{ route('admin.fuel.create') }}" class="float-right">Add new fuel record</a></div>
					<div class="card-body">
						@if(isset($fuels))
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>ID</th>
										<th>Vehicle</th>
										<th>Vendor</th>
										<th>Payment type</th>
										<th>Total Amount</th>
										<th>Actions</th>
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
											<td>
												<div class="btn-group" role="group" aria-label="Vendor Actions">
													<a href="{{ route('admin.fuel.edit',$fuel) }}" class="btn btn-secondary">Edit</a>

													<a href="{{ route('admin.fuel.destroy',$fuel) }}"  class="btn btn-danger">Delete</a>
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