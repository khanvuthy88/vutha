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
						{{ $vendor->exists ? 'Udate Vendor' : 'New Vendor' }}
					</div>
					{!! Form::model($vendor, [
							'route' =>$vendor->exists ? ['admin.vendor.update',$vendor] : 'admin.vendor.store'
						]) 
					!!}
						<div class="card-body">
							<div class="form-group row">
								<div class="col-md-6">
									{!! Form::label('name', NULL, []) !!}
									{!! Form::text('name', $vendor->exists ? $vendor->name : NULL, ['class'=>'form-control','placeholder'=>'Vendor name']) !!}
								</div>
								<div class="col-md-6">
									{!! Form::label('code', NULL, []) !!}
									{!! Form::text('code', $vendor->exists ? $vendor->code : NULL, ['class'=>'form-control','placeholder'=>'Vendor code']) !!}
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									{!! Form::label('tel', NULL, []) !!}
									{!! Form::text('tel', $vendor->exists ? $vendor->tel : NULL, ['class'=>'form-control','placeholder'=>'Vendor tel']) !!}
								</div>
								<div class="col-md-6">
									{!! Form::label('phone', NULL, []) !!}
									{!! Form::text('phone', $vendor->exists ? $vendor->phone : NULL, ['class'=>'form-control','placeholder'=>'Vendor phone']) !!}
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									{!! Form::label('address', NULL, []) !!}
									{!! Form::text('address', $vendor->exists ? $vendor->address : NULL, ['class'=>'form-control','placeholder'=>'Vendor address']) !!}
								</div>
								<div class="col-md-6">
									{!! Form::label('post_code', NULL, []) !!}
									{!! Form::text('post_code', $vendor->exists ? $vendor->post_code : NULL, ['class'=>'form-control','placeholder'=>'Vendor post code']) !!}
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									{!! Form::label('email', NULL, []) !!}
									{!! Form::text('email', $vendor->exists ? $vendor->email : NULL, ['class'=>'form-control','placeholder'=>'Vendor email']) !!}
								</div>
								<div class="col-md-6">
									{!! Form::label('Location', NULL, []) !!}
									{!! Form::select('location_id', $locationsArray, $vendor->exists ? $vendor->location_id : NULL, ['class'=>'form-control']) !!}
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">		
									{!! Form::checkbox('active', NULL, $checked, []) !!} 
									{!! Form::label('Active', NULL, []) !!}
								</div>								
							</div>
							<div class="form-group row">
								<div class="col-md-12">		
									{!! Form::label('description', NULL, []) !!}
									{!! Form::textarea('description', $vendor->exists ? $vendor->description : NULL, ['class'=>'form-control']) !!}
								</div>								
							</div>
						</div>
						<div class="card-footer clearfix">
							<a href="{{ route('admin.vendor.index') }}" class="btn btn-secondary float-left">Cancel</a>
							{!! Form::submit($vendor->exists ? 'Update Vendor' : 'Submit', ['class'=>'btn btn-primary float-right']) !!}
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

@endsection