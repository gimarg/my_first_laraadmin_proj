@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/type_of_costs') }}">Type of Cost</a> :
@endsection
@section("contentheader_description", $type_of_cost->$view_col)
@section("section", "Type of Costs")
@section("section_url", url(config('laraadmin.adminRoute') . '/type_of_costs'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Type of Costs Edit : ".$type_of_cost->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($type_of_cost, ['route' => [config('laraadmin.adminRoute') . '.type_of_costs.update', $type_of_cost->id ], 'method'=>'PUT', 'id' => 'type_of_cost-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'name')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/type_of_costs') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#type_of_cost-edit-form").validate({
		
	});
});
</script>
@endpush
