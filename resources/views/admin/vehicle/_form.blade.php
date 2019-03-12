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
						{{ $vehicle->exists ? 'Udate Vehicle' : 'New Vehicle' }}
					</div>
					{!! Form::model($vehicle, [
							'route' =>$vehicle->exists ? ['admin.vehicle.update',$vehicle] : 'admin.vehicle.store'
						]) 
					!!}
						<div class="card-body">
							<div class="form-group row">
								<div class="col-md-6">
									{!! Form::label('make', NULL, []) !!}
									{!! Form::text('make', $vehicle->exists ? $vehicle->make : NULL, ['class'=>'form-control','placeholder'=>'Vehicle make']) !!}
								</div>
								<div class="col-md-6">
									{!! Form::label('model', NULL, []) !!}
									{!! Form::text('model', $vehicle->exists ? $vehicle->model : NULL, ['class'=>'form-control','placeholder'=>'Vehicle model']) !!}
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									{!! Form::label('version', NULL, []) !!}
									{!! Form::text('version', $vehicle->exists ? $vehicle->version : NULL, ['class'=>'form-control','placeholder'=>'Vehicle version']) !!}
								</div>
								<div class="col-md-6">
									{!! Form::label('plat_number', NULL, []) !!}
									{!! Form::text('plat_number', $vehicle->exists ? $vehicle->plat_number : NULL, ['class'=>'form-control','placeholder'=>'Vehicle plat_number']) !!}
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									{!! Form::label('registration_date', NULL, []) !!}
									{!! Form::date('registration_date', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}

								</div>
								<div class="col-md-6">
									{!! Form::label('engine_number', NULL, []) !!}
									{!! Form::text('engine_number', $vehicle->exists ? $vehicle->engine_number : NULL, ['class'=>'form-control','placeholder'=>'Vehicle engine number']) !!}
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									{!! Form::label('color', NULL, []) !!}
									{!! Form::text('color', $vehicle->exists ? $vehicle->color : NULL, ['class'=>'form-control','placeholder'=>'Vehicle color']) !!}
								</div>
								<div class="col-md-6">
									{!! Form::label('Location', NULL, []) !!}
									{!! Form::select('location_id', $locationsArray, $vehicle->exists ? $vehicle->location_id : NULL, ['class'=>'form-control']) !!}
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									{!! Form::label('vehicle_type', NULL, []) !!}
									{!! Form::text('vehicle_type', $vehicle->exists ? $vehicle->vehicle_type : NULL, ['class'=>'form-control','placeholder'=>'Vehicle type']) !!}
								</div>
								<div class="col-md-6">
									{!! Form::label('department', NULL, []) !!}
									{!! Form::text('department', $vehicle->exists ? $vehicle->department : NULL, ['class'=>'form-control','placeholder'=>'Department']) !!}
								
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									{!! Form::label('Driver', NULL, []) !!}
									{!! Form::select('user_id', $usersArray, $vehicle->exists ? $vehicle->user_id : NULL, ['class'=>'form-control']) !!}
								</div>
								<div class="col-md-6">
									{!! Form::label('Active', NULL, []) !!}
									<div class="form-check">
									  <input class="active" type="checkbox" checked="{{ $checked }}">
									  <label class="form-check-label" for="defaultCheck1">
									    Is Active
									  </label>
									</div>
									
								</div>
							</div>	
							<div class="form-group row">
								<div class="col-md-12">		
									{!! Form::label('description', NULL, []) !!}
									{!! Form::textarea('description', $vehicle->exists ? $vehicle->description : NULL, ['class'=>'form-control']) !!}
								</div>								
							</div>
						</div>
						<div class="card-footer clearfix">
							<a href="{{ route('admin.vehicle.index') }}" class="btn btn-secondary float-left">Cancel</a>
							{!! Form::submit($vehicle->exists ? 'Update Vehicle' : 'Submit', ['class'=>'btn btn-primary float-right']) !!}
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

@endsection