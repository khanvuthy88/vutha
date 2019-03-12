@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				@include('admin.sitebar')
			</div>
			<div class="col-md-9">
				<div class="card">
					<div class="card-header">Confirm action</div>
					{!! Form::model($fuel, ['route'=>['admin.fuel.confirm_destroy',$fuel]]) !!}
						<div class="card-body">
							Are you sure want to delete this user ? You will not be able to recover this user.
						</div>
					
						<div class="card-footer clearfix">
							<a href="{{ route('admin.fuel.index') }}" class="btn btn-secondary float-left">Cancel</a>
							{!! Form::submit('Yes, delete', ['class'=>'btn btn-danger float-right']) !!}
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection
