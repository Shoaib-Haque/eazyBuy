@extends('layouts/adminlayout')
@section('editbrand')
	<form method="POST">
		{{csrf_field()}}

		<div class="main">
			<h3>
				<span class="normal">Brands</span>
				<div class="button-group">
					
					<button type="submit" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Save"
						onclick="return validation()">
						<i class="fas fa-save"></i>
					</button>
					<a href="/admin/catalog/brand">
						<button type="button" class="btn btn-light border" 
						data-toggle="tooltip" data-placement="top" title="Cancel">
							<i class="fas fa-long-arrow-alt-left"></i>
						</button>
					</a>
				</div>
			</h3>
		</div>

		<hr class="full">
		<div class="main list">
			<div class="heading">
				<i class="fas fa-pencil-alt"></i> Edit Brand
			</div>
			<div class="table-div">
				<table class="table-sm device-width">
					<tr>
				      	<td class="td-left full"><strong><font class="star">*</font>Brand Name</strong></td>
				        <td class="td-right full"><input type="text" name="name" maxlength="100" id="name" 
				        	value="{{ old('name') ? old('name') : $brand->name}}">
				        	<font color="red">
				                <span id="nameLabel"></span>
				                @if ($errors->has('name'))
				                  {{ $errors->first('name') }}
				                @endif
		              		</font>
				        </td>
				    </tr>
				</table>
			</div>
		</div>

	</form>
	
	<script type="text/javascript" src="{{ asset('js/admin/catalog/brand/validation.js') }}"></script>
@endsection