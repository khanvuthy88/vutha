@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				@include('admin.sitebar')
			</div>
			<div class="col-md-9">
				<div class="card">
					<div class="card-header">All Users <a href="{{ route('admin.user.create') }}" class="float-right">Create New User</a></div>
					<div class="card-body">
						@if(isset($users))
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Address</th>
										<th>Actions</th>
									</tr>
								</thead>			
								<tbody>
									@foreach($users as $user)
										<tr>
											<td>{{ $user->id }}</td>
											<td>{{ $user->name }}</td>
											<td>{{ $user->email }}</td>
											<td>{{ $user->UserDetail->phone }}</td>
											<td>{{ $user->UserDetail->address }}</td>
											<td>
												<div class="btn-group" role="group" aria-label="User Actions">
													<a href="{{ route('admin.user.edit',$user) }}" class="btn btn-secondary">Edit</a>

													<a href="{{ route('admin.user.destroy',$user) }}"  class="btn btn-danger">Delete</a>
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