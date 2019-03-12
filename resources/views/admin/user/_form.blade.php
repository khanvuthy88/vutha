@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				@include('admin.sitebar')
			</div>
			<div class="col-md-9">
				<div class="card">
					<div class="card-header">
						{{ $user->exists ? 'Udate User' : 'New User' }}
					</div>
					{!! Form::model($user, ['route'=>$user->exists ? ['admin.user.update',$user,$user->UserDetail] : 'admin.user.store']) !!}
						<div class="card-body">
							<div class="form-group row">
								<div class="col-md-6">
									{!! Form::label('name', NULL, []) !!}
									{!! Form::text('name', $user->exists ? $user->name : NULL, ['class'=>'form-control']) !!}
								</div>
								<div class="col-md-6">
									{!! Form::label('email', NULL, []) !!}
									{!! Form::text('email', $user->exists ? $user->email : NULL, ['class'=>'form-control']) !!}
								</div>
							</div>
							@if ($user->exists)
								<div class="form-group row">
									<div class="col-md-6">
										{!! Form::label('user_type', NULL, []) !!}
										{!! Form::select('user_type', ['Driver'=>'Driver','System'=>'System'], $user->UserDetail->user_type, ['class'=>'form-control']) !!}
									</div>
								</div>
							@else
								<div class="form-group row">
									<div class="col-md-6">
										{!! Form::label('password', NULL, []) !!}
										{!! Form::password('password', ['class'=>'form-control']) !!}
									</div>
									<div class="col-md-6">
										{!! Form::label('User type', NULL, []) !!}
										{!! Form::select('user_type', ['Driver','System'], 'Driver', ['class'=>'form-control']) !!}
									</div>
								</div> 
							@endif
							@if (NULL !== $user->UserDetail)
								<div class="form-group row">
									<div class="col-md-6">
										{!! Form::label('phone', NULL, []) !!}
										{!! Form::text('phone', $user->exists ? $user->UserDetail->phone : NULL, ['class'=>'form-control']) !!}
									</div>
									<div class="col-md-6">										
										{!! Form::label('employment_number', NULL, []) !!}
										{!! Form::number('employment_number', $user->exists ? $user->UserDetail->employment_number : NULL, ['class'=>'form-control']) !!}										
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-6">
										{!! Form::label('address', NULL, []) !!}
										{!! Form::text('address', $user->exists ? $user->UserDetail->address :NULL, ['class'=>'form-control','placeholder'=>'Address']) !!}
									</div>
									<div class="col-md-6">
										{!! Form::label('location_id', NULL, []) !!}
										{!! Form::select('location_id', $locationsArray, $user->UserDetail->location_id, ['class'=>'form-control']) !!}
									</div>
								</div>
							@else
								<div class="form-group row">
									<div class="col-md-6">
										{!! Form::label('phone', NULL, []) !!}
										{!! Form::text('phone', NULL, ['class'=>'form-control','placeholder'=>'Phone Number ']) !!}
									</div>
									<div class="col-md-6">
										{!! Form::label('employment_id', NULL, []) !!}
										{!! Form::number('employment_number', NULL, ['class'=>'form-control','placeholder'=>'Employment ID']) !!}
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-6">
										{!! Form::label('address', NULL, []) !!}
										{!! Form::text('address', NULL, ['class'=>'form-control','placeholder'=>'Address']) !!}
									</div>
									<div class="col-md-6">
										{!! Form::label('location_id', NULL, []) !!}
										{!! Form::select('location_id', $locationsArray, NULL, ['class'=>'form-control']) !!}
									</div>
								</div>
							@endif							
						</div>
						<div class="card-footer clearfix">
							<a href="{{ route('admin.user.index') }}" class="btn btn-secondary float-left">Cancel</a> 
							{!! Form::submit($user->exists ? 'Update User' : 'Submit', ['class'=>'btn btn-primary float-right']) !!}
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

@endsection