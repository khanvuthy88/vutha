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
						{{ $repair->exists ? 'Udate Vehicle' : 'New Vehicle' }}
					</div>
					{!! Form::model($repair, [
							'route' =>$repair->exists ? ['admin.repair.update',$repair] : 'admin.repair.store',
							'files'=>true,
						]) 
					!!}
						<div class="card-body">
							<div class="form-group row">
								<div class="col-md-6">
									{!! Form::label('Vehicle', NULL, []) !!}
									{!! Form::select('vehicle', $vehiclesArray, $repair->exists ? $repair->vehicle_id : NULL, ['class'=>'form-control']) !!}
								
								</div>
								<div class="col-md-6">
									{!! Form::label('repair_type', NULL, []) !!}
									{!! Form::select('repair_type', ['Services'=>'Services','SpareParts'=>'SpareParts'], $repair->exists ? $repair->repair_type : 'SpareParts', ['class'=>'form-control']) !!}

								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									{!! Form::label('vendor', NULL, []) !!}
									{!! Form::select('vendor_id', $vendorsArray, $repair->exists ? $repair->vendor_id : NULL, ['class'=>'form-control']) !!}
								</div>
								<div class="col-md-6">
									{!! Form::label('invoice_number', NULL, []) !!}
									{!! Form::text('invoice_number', $repair->exists ? $repair->invoice_number : NULL, ['class'=>'form-control','placeholder'=>'Invoice number']) !!}
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									{!! Form::label('invoice_date', NULL, []) !!}
									{!! Form::date('invoice_date', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}

								</div>
								<div class="col-md-6">
									{!! Form::label('invoice_due_date', NULL, []) !!}
									{!! Form::date('invoice_due_date', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}									
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									{!! Form::label('payment_type', NULL, []) !!}
									{!! Form::select('payment_type',['Cash'=>'Cash','Check'=>'Check'],'Cash' , ['class'=>'form-control']) !!}

								</div>
								<div class="col-md-6">
									{!! Form::label('document_number', NULL, []) !!}
									{!! Form::text('document_number', $repair->exists ? $repair->document_number : NULL, ['class'=>'form-control','placeholder'=>'Document Number']) !!}
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-12">
									{!! Form::label('description', NULL, []) !!}
									{!! Form::textarea('description', $repair->exists ? $repair->description : NULL, ['class'=>'form-control']) !!}
								</div>
								
							</div>							
							<div class="form-group row">
								<div class="col-md-6">		
									{!! Form::label('attachment', NULL, []) !!}
									{!! Form::file('attachment', []) !!}
								</div>								
							</div>
						</div>
						<div class="card-footer clearfix">
							<a href="{{ route('admin.repair.index') }}" class="btn btn-secondary float-left">Cancel</a>
							{!! Form::submit($repair->exists ? 'Update Vehicle' : 'Submit', ['class'=>'btn btn-primary float-right']) !!}
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

@endsection