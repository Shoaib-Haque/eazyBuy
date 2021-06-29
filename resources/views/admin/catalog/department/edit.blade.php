@extends('layouts/adminlayout')
@section('editdepartment')
	<form method="POST" id="form">
		{{csrf_field()}}

		<div class="main">
			<h3>
				<span class="normal">Departments</span>
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
					    			<h6>Are you sure you want to change this department name?</h6>
					      		</div>
					      		<div>
					      			<a href="/admin/catalog/department">
					        			<button type="button" class="btn btn-danger btn-sm ml-3">No</button>
					        		</a>
					        		<button type="submit" class="btn btn-success btn-sm">Yes</button>
					      		</div>
					    	</div>
					  	</div>
					</div>

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
				<i class="fas fa-pencil-alt"></i> Edit Department
			</div>
			<div class="table-div">
				<table class="table-sm device-width">
					<tr>
				      	<td class="td-left full"><strong><font class="star">*</font>Department Name</strong></td>
				        <td class="td-right full">
				        	<input type="text" name="title" maxlength="100" id="name" 
				        	value="{{ old('title') ? old('title') : $department->title }}">
				        	<input type="hidden" name="same" id="same" value="{{ $department->title }}">
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
	
	<script type="text/javascript" src="{{ asset('js/admin/catalog/department/edit/validation.js') }}"></script>
@endsection