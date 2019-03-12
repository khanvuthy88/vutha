@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				@include('admin.sitebar')
			</div>
			<div class="col-md-9">
				<div class="card">
					<div class="card-header">All Vendors <a href="{{ route('admin.vendor.create') }}" class="float-right">Create New Vendor</a></div>
					<div class="card-body">
						@if(isset($vendors))
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Code</th>
										<th>Phone</th>
										<th>Address</th>
										<th>Actions</th>
									</tr>
								</thead>			
								<tbody>
									@foreach($vendors as $vendor)
										<tr>
											<td>{{ $vendor->id }}</td>
											<td>{{ $vendor->name }}</td>
											<td>{{ $vendor->code }}</td>
											<td>{{ $vendor->phone }}</td>
											<td>{{ $vendor->address }}</td>
											<td>
												<div class="btn-group" role="group" aria-label="Vendor Actions">
													<a href="{{ route('admin.vendor.edit',$vendor) }}" class="btn btn-secondary">Edit</a>

													<a href="{{ route('admin.vendor.destroy',$vendor) }}"  class="btn btn-danger">Delete</a>
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