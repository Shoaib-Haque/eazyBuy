@extends('layouts/adminlayout')
@section('addcategory')
	<div class="main">
		<h1>
			<span class="normal">Categories</span>
			<div class="button-group">
				<form method="POST">
					{{csrf_field()}}
				<button type="submit" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Save"
					onclick="return validation()">
					<i class="fas fa-save"></i>
				</button>
				<a href="/admin/catalog/categories">
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
				<i class="fas fa-pencil-alt"></i> Add Category
			</div>
		</div>
		<div class="form-table-div">
			<table>
				<tr>
			      	<td class="td-left"><strong><font class="star">*</font>Category Name</strong></td>
			        <td class="td-right"><input type="text" name="title" maxlength="100" id="name" value="{{ old('title') }}">
			        	<font color="red">
			                <span id="nameLabel"></span>
			                @if ($errors->has('title'))
			                  {{ $errors->first('title') }}
			                @endif
	              		</font>
			        </td>
			    </tr>
			    <tr class="border_bottom"><td colspan="2"></td></tr>
			    <tr><td colspan="2"></td></tr>
			    <tr>
			    	<td class="td-left"><strong><font class="star">*</font>Department</strong></td>
			    	<td>
			    		<select name="department_id" id="did">
			    			<option value="">Select Department</option>
			    			@foreach($departmentlist as $key => $value)
			    				<option value="{{$value->id}}" {{ old('department_id') ==  $value->id ? "selected" : "" }}>
			    					{{$value->title}}
			    				</option>
			    			@endforeach
			    		</select>
			    		<font color="red">
			                <span id="departmentLabel"></span>
			                @if ($errors->has('department_id'))
			                  {{ $errors->first('department_id') }}
			                @endif
	              		</font>
			    	</td>
			    </tr>
			</table>
			</form>
		</div>
	</div>

	<script type="text/javascript" src="{{ asset('js/admin/catalog/category/validation.js') }}"></script>
@endsection