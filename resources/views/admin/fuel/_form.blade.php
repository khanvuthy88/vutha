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
						{{ $fuel->exists ? 'Udate Fuel' : 'New Fuel' }}
					</div>
					{!! Form::model($fuel, [
							'route' =>$fuel->exists ? ['admin.fuel.update',$fuel] : 'admin.fuel.store',
							'files'=>true,
						]) 
					!!}
						<div class="card-body">
							<div class="form-group row">
								<div class="col-md-6">
									{!! Form::label('vehicle', NULL, []) !!}
									{!! Form::select('vehicle', $vehiclesArray, $fuel->exists ? $fuel->vehicle_id : NULL, ['class'=>'form-control']) !!}								
								</div>
								<div class="col-md-6">
									{!! Form::label('vendor', NULL, []) !!}
									{!! Form::select('vendor_id', $vendorsArray, $fuel->exists ? $fuel->vendor_id : NULL, ['class'=>'form-control']) !!}

								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									{!! Form::label('quantity', NULL, []) !!}
									{!! Form::number('quantity', $fuel->exists ? $fuel->quantity : NULL, ['class'=>'form-control','placeholder'=>'Quantity']) !!}
								</div>
								<div class="col-md-6">
									{!! Form::label('price_per_lit', NULL, []) !!}
									{!! Form::number('price_per_lit', $fuel->exists ? $fuel->price_per_lit : NULL,['class'=>'form-control','placeholder'=>'Price Per litt']) !!}
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									{!! Form::label('payment_date', NULL, []) !!}
									{!! Form::date('payment_date', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}

								</div>
								<div class="col-md-6">
									{!! Form::label('filling_date', NULL, []) !!}
									{!! Form::date('filling_date', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}									
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									{!! Form::label('fuel_type', NULL, []) !!}
									{!! Form::select('fuel_type',['Diesel'=>'Diesel','Gasoline'=>'Gasoline'],$fuel->exists ? $fuel->fuel_type : 'Diesel' , ['class'=>'form-control']) !!}
								</div>
								<div class="col-md-6">
									{!! Form::label('payment_type', NULL, []) !!}
									{!! Form::select('payment_type', ['Cash'=>'Cash','Check'=>'Check'], $fuel->exists ? $fuel->payment_type : NULL, ['class'=>'form-control']) !!}
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									{!! Form::label('total_amount', NULL, []) !!}
									{!! Form::number('total_amount', $fuel->exists ? $fuel->total_amount : NULL, ['class'=>'form-control']) !!}
								</div>
								<div class="col-md-6">		
									{!! Form::label('attachment', NULL, []) !!}
									{!! Form::file('attachment', []) !!}
								</div>		
							</div>
							<div class="form-group row">
								<div class="col-md-12">
									{!! Form::label('note', NULL, []) !!}
									{!! Form::textarea('note', $fuel->exists ? $fuel->note : NULL, ['class'=>'form-control']) !!}
								</div>
								
							</div>				
							
						</div>
						<div class="card-footer clearfix">
							<a href="{{ route('admin.fuel.index') }}" class="btn btn-secondary float-left">Cancel</a>
							{!! Form::submit($fuel->exists ? 'Update Vehicle' : 'Submit', ['class'=>'btn btn-primary float-right']) !!}
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

@endsection