@extends('layouts/adminlayout')
@section('addsubcategory')
	<form method="POST" id="form">
		{{csrf_field()}}

		<div class="main">
			<h3>
				<span class="normal">Subcategories</span>
				<div class="button-group">
					<button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Save"
						onclick="return validation();">
						<i class="fas fa-save"></i>
					</button>

					<a href="/admin/catalog/subcategory">
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
				<i class="fas fa-pencil-alt"></i> Add Subcategory
			</div>

			<div class="form-table-div">
				<table class="table-sm device-width">
					<tr>
				    	<td class="td-left full"><strong><font class="star">*</font>Department</strong></td>
				    	<td class="td-right full">
				    		<select name="department_id" id="did">
				    			<option value="">Select Department</option>
				    			@foreach($departmentlist as $key => $value)
				    				<option value="{{$value->id}}" {{ old('department_id') ==  $value->id ? "selected" : "" }}>
				    					{{$value->title}}
				    				</option>
				    			@endforeach
				    		</select>
				    		<font color="red">
				                <span id="departmentLabel">
					                @if ($errors->has('department_id'))
					                  {{ $errors->first('department_id') }}
					                @endif
					            </span>
		              		</font>
				    	</td>
				    </tr>

				    <tbody id="category_tbody">
			        	<tr class="border_bottom"><td colspan="2"></td></tr>
				        <tr><td colspan="2"></td></tr>

				        <tr>
				        	<td class="td-left full"><strong><font class="star">*</font>Category</strong></td>
				            <td class="td-right full">
				            	<select name="category_id" id="category_id">
				            		<option value="">Select Department First</option>
				            	</select>
				            </td>
				        </tr>
			        </tbody>

				    <tr class="border_bottom"><td colspan="2"></td></tr>
				    <tr><td colspan="2"></td></tr>

				    <tr>
				      	<td class="td-left full"><strong><font class="star">*</font>Subcategory Name</strong></td>
				        <td class="td-right full">
				        	<input type="text" name="title" maxlength="100" id="name" value="{{ old('title') }}">
				        	<font color="red">
				                <span id="nameLabel">
					                @if ($errors->has('title'))
					                  {{ $errors->first('title') }}
					                @endif
				                </span>
		              		</font>
				        </td>
				    </tr>
				</table>
			</div>
		</div>

	</form>
	<script type="text/javascript" src="{{ asset('js/admin/catalog/subcategory/add/validation.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/admin/catalog/subcategory/category.js') }}"></script>
@endsection