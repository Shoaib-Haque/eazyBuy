@extends('layouts/adminlayout')
@section('editsubcategory')
	<form method="POST" id="form">
		{{csrf_field()}}

		<div class="main">
			<h3>
				<span class="normal">Subcategories</span>
				<div class="button-group">
					
					<button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Save"
						onclick="return validation()">
						<i class="fas fa-save"></i>
					</button>

					<div class="modal fade" id="confirmBox" tabindex="-1" role="dialog" 
					aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
					    	<div class="modal-content">
					    		<div class="modal-body">
					    			<h6>Are you sure you want to save changes?</h6>
					      		</div>
					      		<div>
					      			<a href="/admin/catalog/subcategory">
					        			<button type="button" class="btn btn-danger btn-sm ml-3">No</button>
					        		</a>
					        		<button type="submit" class="btn btn-success btn-sm">Yes</button>
					      		</div>
					    	</div>
					  	</div>
					</div>

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
				<i class="fas fa-pencil-alt"></i> Edit Subcategory
			</div>
			<div class="form-table-div">
				<table class="table-sm device-width">
					<tr>
				      	<td class="td-left full"><strong><font class="star">*</font>Subcategory Name</strong></td>
				        <td class="td-right full"><input type="text" name="title" maxlength="100" id="name" 
				        	value="{{ old('title') ? old('title') : $subcategory->title}}">
				        	<input type="hidden" name="" id="oldname" value="{{ $subcategory->title }}">
				        	<font color="red">
				                <span id="nameLabel">
					                @if ($errors->has('title'))
					                  {{ $errors->first('title') }}
					                @endif
				                </span>
		              		</font>
				        </td>
				    </tr>

				    <tr class="border_bottom"><td colspan="2"></td></tr>
				    <tr><td colspan="2"></td></tr>

				    <tr>
				    	<td class="td-left full"><strong><font class="star">*</font>Department</strong></td>
				    	<td class="td-right full">
				    		<input type="hidden" name="" id="olddid" value="{{ $subcategory->did }}">
				    		<select name="department_id" id="did">
				    			<option value="">Select Department</option>
				    			@foreach($departmentlist as $key => $value)
				    				<option value="{{$value->id}}" {{ $value->id == $subcategory->did ? 'selected' : '' }}>
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

				    <tr class="border_bottom"><td colspan="2"></td></tr>
				    <tr><td colspan="2"></td></tr>

				    <tbody id="category_tbody">
				    <tr>
				    	<td class="td-left full"><strong><font class="star">*</font>Category</strong></td>
				    	<td class="td-right full">
				    		<input type="hidden" name="" id="oldcid" value="{{ $subcategory->cid }}">
				    		<select name="category_id" id="category_id">
				    			<option value="">Select Category</option>
				    			@foreach($categorylist as $key => $value)
				    				<option value="{{$value->id}}" {{ $value->id == $subcategory->cid ? 'selected' : '' }}>
				    					{{$value->title}}
				    				</option>
				    			@endforeach
				    		</select>
				    		<font color="red">
				                <span id="categoryLabel">
					                @if ($errors->has('category_id'))
					                  {{ $errors->first('category_id') }}
					                @endif
				                </span>
		              		</font>
				    	</td>
				    </tr>
					</tbody>
				</table>
			</div>
		</div>
		
	</form>

	<script type="text/javascript" src="{{ asset('js/admin/catalog/subcategory/edit/validation.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/admin/catalog/subcategory/category.js') }}"></script>
@endsection