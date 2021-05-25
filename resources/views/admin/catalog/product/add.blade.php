<!DOCTYPE html>
@extends('layouts/adminlayout')
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="{{asset('css/admin/catalog/product/add.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('css/admin/catalog/product/editor.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('css/admin/catalog/product/option.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('css/admin/catalog/product/uploadImage.css')}}" type="text/css">
</head>
<body>
	@section('addproduct')
	<div class="main">
		<h1>
			<span class="normal">Products</span>
			<div class="button-group">
				<form method="POST" id="token">
					{{csrf_field()}}
				<button type="submit" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Save"
					onclick="return validation()">
					<i class="fas fa-save"></i>
				</button>
				<a href="/admin/catalog/products">
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
				<i class="fas fa-pencil-alt"></i> Add Product
			</div>
		</div>

		<div class="table-div">
			<div class="nav nav-tabs buttons" id="nav-tab" role="tablist">
				<a onclick="divVisibility('general');" class="nav-item nav-link active" data-toggle="tab" aria-selected="true">General</a>
				<a onclick="divVisibility('data');" class="nav-item nav-link" data-toggle="tab" aria-selected="false">Data</a>
				<a onclick="divVisibility('links');" class="nav-item nav-link" data-toggle="tab" aria-selected="false">Links</a>
				<a onclick="divVisibility('options');" class="nav-item nav-link" data-toggle="tab" aria-selected="false">Option</a>
				<a onclick="divVisibility('price');" class="nav-item nav-link" data-toggle="tab" aria-selected="false">Price</a>
				<a onclick="divVisibility('image');" class="nav-item nav-link" data-toggle="tab" aria-selected="false">Image</a>
				<a onclick="divVisibility('features');" class="nav-item nav-link" data-toggle="tab" aria-selected="false">
				Features</a>
			</div>

			
			<div id="general">
				<table>
			    	<tr>
			        	<td class="td-left"><strong><font class="star">*</font>Product Name</strong></td>
			            <td class="td-right"><input type="text" name="title" id="name"></td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

			        <tr>
			        	<td class="td-left"><strong>Description</strong></td>
			            <td class="td-right">
			            	<div id="toolbar-container"></div>
        					<div id="editor"></div>
        					<input type="hidden" name="description" id="description" value="">
			            </td>
			        </tr>
			    </table>
			</div>

			<div id="data">
				<table>
					<tr>
			        	<td class="td-left"><strong><font class="star">*</font>Model</strong></td>
			            <td class="td-right"><input type="text" name="model" id="model"></td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

					<tr>
			        	<td class="td-left"><strong>Size Class</strong></td>
			            <td class="td-right">
			            	<select name="size_class" id="size_class">
			            		<option value="">Select Size Class</option>
			            		<option value="centimeter">Centimeter</option>
			            		<option value="millimeter">Millimeter</option>
			            		<option value="inch">Inch</option>
			            	</select>
			            </td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

			    	<tr>
			        	<td class="td-left"><strong>Size</strong></td>
			            <td class="td-right"><input type="text" name="size" id="size"></td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

			        <tr>
			        	<td class="td-left"><strong>Weight Class</strong></td>
			            <td class="td-right">
			            	<select name="weight_class" id="weight_class">
			            		<option value="">Select Weight Class</option>
			            		<option value="kiligram">Kiligram</option>
			            		<option value="gram">Gram</option>
			            		<option value="pound">Pound</option>
			            		<option value="ounch">Ounch</option>
			            	</select>
			            </td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

			        <tr>
			        	<td class="td-left"><strong>Weight</strong></td>
			            <td class="td-right"><input type="text" name="weight" id="weight"></td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

			        <tr>
			        	<td class="td-left">
			        		<input type="checkbox" name="shipping_required" value="Shipping Required" 
			        		id="shipping_required" onclick="maximumDay()">
			        		Shipping Required
			        	</td>
				        <td class="td-right" id="maximum_day_needs_to_arrive_td">
				           	<strong><font class="star">*</font>Maximum Days Needs To Arrive</strong>
				           	<input type="number" name="maximum_day_needs_to_arrive" id="maximum_day_needs_to_arrive">
				        </td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

			        <tr>
			        	<td class="td-left"><strong>Subtract Stock</strong></td>
			            <td class="td-right">
			            	<select name="subtract_stock">
			            		<option value="yes">Yes</option>
			            		<option value="no">No</option>
			            	</select>
			            </td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

			        <tr>
			        	<td class="td-left"><strong>Tax Class</strong></td>
			            <td class="td-right">
			            	<select name="subtract_stock">
			            		<option value="none">None</option>
			            		<option value="taxable_goods">Taxable Goods</option>
			            		<option value="downloadable_products">Downloadable Products</option>
			            	</select>
			            </td>
			        </tr>

			    </table>
			</div>

			<div id="links">
				<table>
					<tr>
			        	<td class="td-left"><strong><font class="star">*</font>Department</strong></td>
			            <td class="td-right">
			            	<select name="department_id" id="department_id">
			            		<option value="">Select Department</option>
			            		@foreach($departmentlist as $key => $value)
			            			<option value="{{$value->id}}">{{$value->title}}</option>
			            		@endforeach
			            	</select>
			            </td>
			        </tr>

			        <tbody id="category_tbody">
			        	<tr class="border_bottom"><td colspan="2"></td></tr>
				        <tr><td colspan="2"></td></tr>

				        <tr>
				        	<td class="td-left"><strong><font class="star">*</font>Category</strong></td>
				            <td class="td-right">
				            	<select name="category_id" id="category_id">
				            		<option value="">Select Department First</option>
				            	</select>
				            </td>
				        </tr>
			        </tbody>
			    	
			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

			        <tr>
			        	<td class="td-left"><strong><font class="star">*</font>Brand</strong></td>
			            <td class="td-right">
			            	<select name="brand_id" id="brand_id">
			            		<option>Select Brand</option>
			            	</select>
			            </td>
			        </tr>
			    </table>
			</div>

			<div id="options">
				<div id="option-div">
					<div class="option">
						<div class="remove-option">
							<div class="remove-btn">
								<span class="remove-option-group-class" id='remove-option-group-id' 
								data-toggle="tooltip" data-placement="top" title="Remove Option Group">
									<i class="far fa-trash-alt"></i>
								</span>
							</div>
						</div>

						<div class="option-table">
							<table class="table table-borderless">
								<tr>
									<th><font class="star">*</font>Option Group</th>
									<th><font class="star">*</font>Input Type</th>
									<th>Required</th>
									<th class="sort-order-th">Sort Order</th>
								</tr>
								<tr>
									<td><input type="text" name=""></td>
									<td>
										<select name="" id="option0">
											<option value="checkbox">Checkbox</option>
											<option value="select">Select</option>
											<option value="radio">Radio Button</option>
										</select>
									</td>
									<td><input type="checkbox" name=""></td>
									<td class="sort-order-td"><input type="number" name=""></td>
								</tr>
							</table>

							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Option</th>
										<th class="option-quantity-th">Quantity</th>
										<th class="option-price-th">Price</th>
										<th class="option-image-th">Image</th>
										<th class="option-remove-th"></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><input type="text" name=""></td>
										<td class="option-quantity-td"><input type="number" name=""></td>
										<td class="option-price-td">
											<select>
												<option>+</option>
												<option>-</option>
											</select>
											<input type="number" name="">
										</td>
										<td class="option-image-td"></td>
										<td class="option-remove-td">
											<button class="btn btn-danger" data-toggle="tooltip" data-placement="top" 
											title="Remove">
												<i class="fa fa-minus-circle" aria-hidden="true"></i>
											</button>
										</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="5" align="right">
											<button class="btn btn-primary" data-toggle="tooltip" data-placement="top" 
											title="Add Row">
												<i class="fa fa-plus-circle" aria-hidden="true"></i>
											</button>
										</td>
									</tr>
								</tfoot>
							</table>
						</div>	
					</div>
				</div>

				<div class="add-option-group-btn-div">
					<button type="button" onclick="addOptionGroup()" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Add Option Group"><i class="fas fa-plus"></i></button>
				</div>
			</div>

			<div id="price">
				<table>
					<tr>
			        	<td class="td-left"><strong><font class="star">*</font>Selling Price</strong></td>
			            <td class="td-right"><input type="number" name="price"></td>
			        </tr>
			    </table>
			</div>

			<div id="image">
				<table>
					<tr class="image-tr">
			        	<td class="image-td-1"><strong><font class="star">*</font>Display Picture</strong></td>
			            <td class="image-td-2">
			            	<div class="uploadOuter">
							  	<label for="uploadFile" class="btn btn-primary">Upload Image</label>
							  	<strong>OR</strong>
								<span class="dragBox" >
								  	Darg and Drop image here
									<input type="file" id="uploadFile"
										onChange="dragNdrop(event)"  ondragover="drag()" ondrop="drop()" />
								</span>
							</div>
			           	</td>

			           	<td class="image-td-3"><div id="preview"></div></td>
			        </tr>
				</table>
			</div>

			<div id="features">
				<table>
					<tr>
						<td class="td-left"><strong>Feature Name</strong></td>
						<td class="td-right"><input type="text" name=""></td>
					</tr>
					<tr>
						<td class="td-left"><strong>Value</strong></td>
						<td class="td-right"><input type="text" name=""></td>
					</tr>
				</table>
			</div>
			</form>
		</div>
	</div>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/decoupled-document/ckeditor.js" async></script>
	<script src="{{ asset('js/admin/catalog/product/addproducttoolbar.js') }}" async></script>
	<script src="{{ asset('js/admin/catalog/product/addproducteditor.js') }}" async></script>
	<script src="{{ asset('js/admin/catalog/product/select.js') }}" async></script>
	<script src="{{ asset('js/admin/catalog/product/option.js') }}" async></script>
	<script src="{{ asset('js/admin/catalog/product/uploadImage.js') }}" async></script>
    @endsection
</body>
</html>