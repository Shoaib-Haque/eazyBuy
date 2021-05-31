<!DOCTYPE html>
@extends('layouts/adminlayout')
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="{{asset('css/admin/catalog/product/add.css')}}"    type="text/css">
	<link rel="stylesheet" href="{{asset('css/admin/catalog/product/editor.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('css/admin/catalog/product/option.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('css/admin/catalog/product/slider.css')}}" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/solid.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" type="text/css">
	
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
				<a onclick="divVisibility('image');" class="nav-item nav-link" data-toggle="tab" aria-selected="false">Image</a>
				<a onclick="divVisibility('features');" class="nav-item nav-link" data-toggle="tab" aria-selected="false">
				Features</a>
			</div>

			
			<div id="general">
				<table>
			    	<tr>
			        	<td class="td-left"><strong><font class="star">*</font>Product Name</strong></td>
			            <td class="td-right"><input type="text" name="title" id="name" placeholder="Product Name"></td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

			        <tr>
			        	<td class="td-left"><strong>About this item</strong></td>
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
			        	<td class="td-left"><strong>Model</strong></td>
			            <td class="td-right"><input type="text" name="model" id="model" placeholder="Model"></td>
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
				           	<input type="number" name="maximum_day_needs_to_arrive" id="maximum_day_needs_to_arrive"
				           	onkeydown="preventDot(event)" onpaste="preventPaste(event)"  oninput="preventInput(event)" 
				           	placeholder="Maximum Days Needs To Arrive">
				        </td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

			        <tr>
			        	<td class="td-left"><strong>Stock Status</strong></td>
			            <td class="td-right">
			            	<select name="stock_status">
			            		<option value="InStock">In Stock</option>
			            		<option value="OutOfStock">Out of Stock</option>
			            	</select>
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
			        	<td class="td-left"><strong><font class="star">*</font>Selling Price</strong></td>
			            <td class="td-right">
			            	<input type="number" name="selling_price" id="selling_price" placeholder="Selling Price"
			            	onkeydown="preventDot(event)" onpaste="preventPaste(event)"  oninput="preventInput(event)">
			            </td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

			        <tr>
			        	<td class="td-left"><strong>Tax Class</strong></td>
			            <td class="td-right">
			            	<select name="subtract_stock">
			            		<option value="none">---None---</option>
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
			            	<i class="fas fa-search form__icon"></i>
			            	<input type="text" name="brandName" id="brandName" 
			            	class="form__input" placeholder="     Search Brand...">
			            </td>
			        </tr>
			    </table>
			</div>

			<div id="options">
				<div class="modal fade" id="sorryImageCount" tabindex="-1" role="dialog" 
				aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLongTitle"><font class="star">Sorry!</font></h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <h6>One Option May Have Ten Images At Most.</h6>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>

				<div class="modal fade" id="sorryFileFormat" tabindex="-1" role="dialog" 
				aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLongTitle"><font class="star">Wrong File Format!</font></h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <h6>You can upload JPEG, PNG, GIF or TIFF files.<br>easyBuy prefers JPEG.</h6>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>

				<div class="modal fade" id="sorryImageBadResolution" tabindex="-1" role="dialog" 
				aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLongTitle"><font class="star">Bad Resolution!</font></h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <h6>Image dimensions need to be at least 500 pixels wide and 500 pixels tall.</h6>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>

				<div class="modal fade" id="sorryImageBigResolution" tabindex="-1" role="dialog" 
				aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLongTitle"><font class="star">Too Large Resolution!</font></h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <h6>Image dimensions need to be at most 10000 pixels wide and 10000 pixels tall.</h6>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>

				<div class="modal fade" id="sorryImageSizeSmall" tabindex="-1" role="dialog" 
				aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLongTitle"><font class="star">Poor Image Size!</font></h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <h6>Image Size is too small. It must be at least 1 megapixel.</h6>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>

				<div class="modal fade" id="sorryImageSizeLarge" tabindex="-1" role="dialog" 
				aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLongTitle"><font class="star">Too Large Image Size!</font></h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <h6>Image Size is too large. It must be at most 10 megapixels.</h6>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>

				<div id="option-div">
					
				</div>

				<div class="add-option-group-btn-div">
					<button type="button" onclick="addOptionGroup()" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Add Option Group"><i class="fas fa-plus"></i></button>
				</div>
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
						<td class="td-left"><strong>Feature Type</strong></td>
						<td class="td-right"><input type="text" name="" placeholder="Feature Type"></td>
					</tr>
					<tr>
						<td class="td-left"><strong>Attribute</strong></td>
						<td class="td-right"><input type="text" name="" placeholder="Attribute"></td>
					</tr>
				</table>
			</div>
			</form>
		</div>
	</div>


	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.0-beta.1/jquery-ui.js"></script>
   	
	<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/decoupled-document/ckeditor.js" async></script>
	<script src="{{ asset('js/admin/catalog/product/addproducttoolbar.js') }}" async></script>
	<script src="{{ asset('js/admin/catalog/product/addproducteditor.js') }}" async></script>
	<script type="text/javascript" src="{{ asset('js/admin/catalog/product/select.js') }}" async></script>
	<script src="{{ asset('js/admin/catalog/product/option.js') }}" async></script>
	<script src="{{ asset('js/admin/catalog/product/slider.js') }}" async></script>
	
    @endsection
</body>
</html>