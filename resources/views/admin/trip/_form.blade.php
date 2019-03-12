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
						{{ $trip->exists ? 'Udate Trip' : 'New Trip' }}
					</div>
					{!! Form::model($trip, [
							'route' =>$trip->exists ? ['admin.trip.update',$trip] : 'admin.trip.store',
							'files'=>true,
						]) 
					!!}
						<div class="card-body">
							<div class="form-group row">
								<div class="col-md-6">
									{!! Form::label('departure_locataion', NULL, []) !!}
									{!! Form::text('departure_locataion', $trip->exists ? $trip->departure_locataion : NULL, ['class'=>'form-control','placeholder'=>'Departure location']) !!}					
								</div>
								<div class="col-md-6">
									{!! Form::label('to_location', NULL, []) !!}
									{!! Form::text('to_location', $trip->exists ? $trip->to_location : NULL, ['class'=>'form-control','placeholder'=>'To Location']) !!}

								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									{!! Form::label('trip_start_date', NULL, []) !!}
									{!! Form::date('trip_start_date', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}								
								</div>
								<div class="col-md-6">
									{!! Form::label('trip_end_date', NULL, []) !!}
									{!! Form::date('trip_end_date', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
								</div>
							</div>
							
							<div class="form-group row">
								<div class="col-md-6">
									{!! Form::label('trip_distance', NULL, []) !!}
									{!! Form::number('trip_distance', $trip->exists ? $trip->trip_distance:NULL, ['class'=>'form-control','placeholder'=>'Trip distance']) !!}
								</div>
								<div class="col-md-6">
									{!! Form::label('vehicle_id', NULL, []) !!}
									{!! Form::select('vehicle_id', $vehiclesArray , $trip->exists ? $trip->payment_type : NULL, ['class'=>'form-control']) !!}
								</div>
							</div>
							
							<div class="form-group row">
								<div class="col-md-12">
									{!! Form::label('note', NULL, []) !!}
									{!! Form::textarea('description', $trip->exists ? $trip->note : NULL, ['class'=>'form-control']) !!}
								</div>
								
							</div>				
							
						</div>
						<div class="card-footer clearfix">
							<a href="{{ route('admin.trip.index') }}" class="btn btn-secondary float-left">Cancel</a>
							{!! Form::submit($trip->exists ? 'Update Vehicle' : 'Submit', ['class'=>'btn btn-primary float-right']) !!}
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

@endsection