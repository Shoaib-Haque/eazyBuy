<!DOCTYPE html>
@extends('layouts/adminlayout')
<html>
<head>
	<title></title>
	<script src="{{ asset('js/admin/catalog/department/validation.js') }}"></script>
</head>
<body>
	@section('adddepartment')
	<div class="main">
		<h1>
			<span class="normal">Departments</span>
			<div class="button-group">
				<form method="POST">
					{{csrf_field()}}
				<button type="submit" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Save"
					onclick="return validation()">
					<i class="fas fa-save"></i>
				</button>
				<a href="/admin/catalog/departments">
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
				<i class="fas fa-pencil-alt"></i> Add Department
			</div>
		</div>
		<div class="table-div">
			<table>
				<tr>
			      	<td class="td-left"><strong><font class="star">*</font>Department Name</strong></td>
			        <td class="td-right"><input type="text" name="title" maxlength="100" id="name" value="{{ old('title') }}">
			        	<font color="red">
			                <span id="nameLabel"></span>
			                @if ($errors->has('title'))
			                  {{ $errors->first('title') }}
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