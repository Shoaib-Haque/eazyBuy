@extends('layouts/adminlayout')
@section('adddepartment')
	<form method="POST" id="form">
		{{csrf_field()}}

		<div class="main">
			<h3>
				<span class="normal">Departments</span>
				<div class="button-group">
					<button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Save"
						onclick="return validation();">
						<i class="fas fa-save"></i>
					</button>

					<a href="/admin/catalog/department">
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
				<i class="fas fa-pencil-alt"></i> Add Department
			</div>

			<div class="form-table-div">
				<table class="table-sm device-width">
					<tr>
				      	<td class="td-left full"><strong><font class="star">*</font>Department Name</strong></td>
				        <td class="td-right full"><input type="text" name="title" maxlength="100" id="name">
				        	<font color="red">
				                <span id="nameLabel"></span>
				                @if ($errors->has('title'))
				                  {{ $errors->first('title') }}
				                @endif
		              		</font>
				        </td>
				    </tr>
				</table>
			</div>
		</div>
		
	</form>

	<script type="text/javascript" src="{{ asset('js/admin/catalog/department/add/validation.js') }}"></script>
@endsection