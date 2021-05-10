<!DOCTYPE html>
@extends('layouts/adminlayout')
<html>
<head>
	<title></title>
	<script src="{{ asset('js/admin/catalog/brand/validation.js') }}"></script>
</head>
<body>
	@section('editbrand')
	<div class="main">
		<h1>
			<span class="normal">Brands</span>
			<div class="button-group">
				<form method="POST">
					{{csrf_field()}}
				<button type="submit" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Save"
					onclick="return validation()">
					<i class="fas fa-save"></i>
				</button>
				<a href="/admin/catalog/brands">
					<button type="button" class="btn btn-light border" data-toggle="tooltip" data-placement="top" title="Cancel">
						<i class="fas fa-long-arrow-alt-left"></i>
					</button>
				</a>
			</div>
		</h1>
	</div>
	<hr class="full">
	<div class="main list">
		<div class="">
			<div class="heading">
				<i class="fas fa-pencil-alt"></i> Edit Brand
			</div>
		</div>
		<div class="table-div">
			<table>
				<tr>
			      	<td class="td-left"><strong><font class="star">*</font>Brand Name</strong></td>
			        <td class="td-right"><input type="text" name="name" maxlength="100" id="name" 
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
			</form>
		</div>
	</div>
	@endsection
</body>
</html>