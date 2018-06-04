@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/costs') }}">Cost</a> :
@endsection
<!-- @section("contentheader_description", $cost->$view_col)
@section("section", "Costs")
@section("section_url", url(config('laraadmin.adminRoute') . '/costs'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Costs Edit : ".$cost->$view_col) -->

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
      <!-- $costs = DB::select("SELECT * FROM `costs` WHERE `user`=1"); -->
      {{ $costs }}
					<div class="form-group">
					</div>
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#cost-edit-form").validate({
		
	});
});
</script>
@endpush
