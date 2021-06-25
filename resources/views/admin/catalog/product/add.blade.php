@extends('layouts/adminlayout')
@section('addproduct')
	<link rel="stylesheet" type="text/css" href="{{asset('css/admin/catalog/product/auto.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/admin/catalog/product/slider.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('css/admin/catalog/product/main.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/admin/catalog/product/general.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/admin/catalog/product/data.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/admin/catalog/product/links.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/admin/catalog/product/option.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/admin/catalog/product/single.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/admin/catalog/product/nested.css')}}">
	<!--<link rel="stylesheet" type="text/css" href="{{asset('css/admin/catalog/product/map.css')}}">-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/admin/catalog/product/image.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/admin/catalog/product/feature.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/admin/catalog/product/discount.css')}}">
	<!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" type="text/css">-->

	<script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
	<!--<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/decoupled-document/ckeditor.js"></script>-->
	<div class="main">
		<h1>
			<span class="normal">Products</span>
			<div class="button-group">
				<form method="POST" id="token">
					{{csrf_field()}}
				<button type="submit" id="submitBtn" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Save"
					onclick="return validation()">
					<i class="fas fa-save"></i>
				</button>
				<a href="/admin/catalog/product">
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
				<!--<a onclick="divVisibility('map');" class="nav-item nav-link" data-toggle="tab" aria-selected="false">
					Size & Color Map
				</a>-->
				<a onclick="divVisibility('image');" class="nav-item nav-link" data-toggle="tab" aria-selected="false">Image</a>
				<a onclick="divVisibility('feature');" class="nav-item nav-link" data-toggle="tab" aria-selected="false">
				Feature</a>
				<a onclick="divVisibility('discount');" class="nav-item nav-link" data-toggle="tab" aria-selected="false">
				Discount</a>
			</div>

			
			<div id="general">
				<table class="table-sm">
			    	<tr>
			        	<td class="td-left"><strong><font class="star">*</font>Product Name</strong></td>
			            <td class="td-right">
			            	<input type="text" name="product_name" id="product_name" placeholder="Product Name">
			            </td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

			        <tr>
			        	<td class="td-left"><strong>About this item</strong></td>
			        	<td class="td-right">
			        		<!--<ck classic editor!-->
			        		<textarea name="about_this_item" id="editor"></textarea>
							<div id="count"></div>
			            </td>
			        </tr>

			        <!--<ck decouple editor
			        tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

			        <tr>
			        	<td class="td-left"><strong>About this item</strong></td>
			            <td class="td-right">
			            	<div id="toolbar-container"></div>
        					<div id="editor"></div>
        					<input type="hidden" name="about_this_item" id="about_this_item" value="">
			            </td>
			        </tr>
			        !-->
			    </table>
			</div>

			<div id="data">
				<table class="table-sm">
					<tr>
			        	<td class="td-left"><strong>Model</strong></td>
			            <td class="td-right"><input type="text" name="model" id="model" placeholder="Model"></td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

			        <tr>
			        	<td class="td-left">
			        		<strong title="Stock-Keeping Unit">
			        			SKU<i class="fas fa-question-circle fa-xs text-primary" aria-hidden="true"></i>
			        		</strong>
			        	</td>
			            <td class="td-right"><input type="text" name="product_sku" id="product_sku" placeholder="SKU"></td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

			        <tr>
			        	<td class="td-left">
			        		<input type="checkbox" value="Shipping Required" onclick="maximumDay()" 
			        		id="shipping_required" name="shipping_required">
			        		Shipping Required
			        	</td>
				        <td class="td-right" id="maximum_day_needs_to_arrive_td">
				           	<strong><font class="star">*</font>Maximum Days Needs To Arrive</strong>
				           	<input type="number" name="maximum_day_needs_to_arrive" id="maximum_day_needs_to_arrive"
				           	onkeydown="preventDot(event)" oninput="preventInput(event)" onpaste="preventPaste(event)"
				           	placeholder="Maximum Days Needs To Arrive">
				        </td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

			        <tr>
			        	<td class="td-left"><strong>Stock Status</strong></td>
			            <td class="td-right">
			            	<select name="stock_status" id="stock_status">
			            		<option value="InStock">In Stock</option>
			            		<option value="OutOfStock">Out of Stock</option>
			            	</select>
			            </td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

			        <tr>
			        	<td class="td-left"><strong>Stock Quantity</strong></td>
			        	<td class="td-right">
			        		<input type="number" name="stock_quantity" id="stock_quantity" 
			        		min="0" placeholder="Stock Quantity"
			        		onkeydown="preventDot(event)" onpaste="preventPaste(event)"  oninput="preventInput(event)">
			        	</td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

			        <tr>
			        	<td class="td-left"><strong>Minimum Quantity</strong></td>
			        	<td class="td-right">
			        		<input type="number" name="minimum_quantity" id="minimum_quantity" 
			        		value="1" min="1" placeholder="Minimum Quantity"
			        		onkeydown="preventDot(event)" onpaste="preventPaste(event)"  oninput="preventInput(event)">
			        	</td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

			        <tr>
			        	<td class="td-left"><strong>Subtract Stock</strong></td>
			            <td class="td-right">
			            	<select name="subtract_stock" id="subtract_stock">
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
			            	<input type="number" name="selling_price" id="selling_price" 
			            	onpaste="preventPaste(event)" min="0" placeholder="Selling Price">
			            </td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

			        <tr>
			        	<td class="td-left"><strong>Tax Class</strong></td>
			            <td class="td-right">
			            	<select name="tax_class" id="tax_class">
			            		<option value="none">---None---</option>
			            		<option value="taxable_goods">Taxable Goods</option>
			            		<option value="downloadable_products">Downloadable Products</option>
			            	</select>
			            </td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

					<tr>
			        	<td class="td-left"><strong>Length Class</strong></td>
			            <td class="td-right">
			            	<select name="length_class" id="length_class">
			            		<option value="">Select Length Class</option>
			            		<option value="centimeter">Centimeter</option>
			            		<option value="millimeter">Millimeter</option>
			            		<option value="inch">Inch</option>
			            	</select>
			            </td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

			    	<tr>
			        	<td class="td-left"><strong>Dimensions (L x W x H)</strong></td>
			            <td class="td-right">
			            <input type="number" name="length" id="length" placeholder="Length" min="0" onpaste="preventPaste(event)">
			            <input type="number" name="width" id="width" placeholder="Width" min="0" onpaste="preventPaste(event)">
			            <input type="number" name="height" id="height" placeholder="Height" min="0" onpaste="preventPaste(event)">
			            </td>
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
			            <td class="td-right">
			            <input type="number" name="weight" id="weight" placeholder="Weight" min="0" onpaste="preventPaste(event)">
			            </td>
			        </tr>
			    </table>
			</div>

			<div id="links">
				<table class="table-sm">
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
			        	<td class="td-left">
			        		<strong title="Autocomplete">
			        			<font class="star">*</font>Brand
			        			<i class="fas fa-question-circle fa-xs text-primary" aria-hidden="true"></i>
			        		</strong>
			        	</td>
			            <td class="td-right">
			            	<input type="text" name="brand" id="brand" class="fas fa-sm" placeholder=" &#xf002; Search Brand...">
			            	<input type="hidden" name="brand_id" id="brand_id">
			            </td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

			        <tr>
			        	<td class="td-left">
			        		<strong title="Autocomplete">
			        			Related Products<i class="fas fa-question-circle fa-xs text-primary" aria-hidden="true"></i>
			        		</strong>
			        	</td>
			            <td class="td-right">
			            	<input type="text" name="related_product_search" id="related_product_search" placeholder="Related Products">
			            </td>
			        </tr>
			    </table>
			</div>

			<div id="options">
				<div id="option-div">
					
				</div>

				<div class="add-option-group-btn-div">
					<button type="button" onclick="addOptionGroup()" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Add Single Option Group">Add Single Option Group</button>
					<strong>OR</strong>
					<select id="nested-group-count">
						<option value="">Select number of nested option</option>
						@for($i = 2; $i <= 15; $i++)
							<option value="{{$i}}">{{$i}}</option>
						@endfor
					</select>
					<button type="button" onclick="addNestedOptionGroup()" class="btn btn-info btn-sm" data-toggle="tooltip" 
					data-placement="top" title="Add Nested Option Group">Add Nested Option Group</button>
				</div>
			</div>

			
			<!--<div id="map">
				<div>
					<font class="star">
						<strong>**This Size and Color Mapping System Preferable for Clothing, Jewelry and Accessories.**</strong>
					</font> 
				</div>
				<div>
					<div class="mb-2 mt-2">
						<select id="size_type_id" name="size_type_id">
							<option value="">Select Size Type</option>
							@foreach($sizetypelist as $key => $value)
				        	    <option value="{{$value->id}}">{{$value->type}}</option>
				       		@endforeach
						</select>
					</div>
					<div id="sizes_div" class="mb-2">
						
					</div>
					<div id="color_div">
						<div class="remove-option mb-0">Add Color Option</div>
						<table class="table color table-bordered table-striped table-sm">
							<thead>
								<tr>
									<th>Color</th>
									<th>Sizes</th>
									<th>quantity</th>
									<th>Price</th>
									<th>Image</th>
									<th></th>
								</tr>
							</thead>
							<tbody id="color-tbody" class="tbody-color">
								
							</tbody>
							<tfoot>
								<tr>
									<td colspan="6" align="right">
										<button type="button" class="btn btn-primary" 
										onclick="addColorOption()" title="Add Color">
											<i class="fas fa-plus"></i>
										</button>
									</td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>-->

			<div id="image">
				<div>
					<label class="btn btn-light btn-sm" for="uploadFile"  title="Upload Image">
						<i class="fas fa-camera"></i>
						<input type="file" name="" id="uploadFile" onchange="upImage(event);">
					</label>
				</div>
				<div id="slider-container-div" class="slider-container">


					<div class="image-prev" onclick="prevImage();" id="control-prev-div"><</div>
					<div class="image-next" onclick="nextImage();" id="control-next-div">></div>
				</div>
			</div>

			<div id="feature">
				<table class="table feature table-bordered table-striped table-sm">
					<thead class="thead-light">
						<tr>
							<th align="center">Future Name</th>
							<th align="center">Future Value</th>
							<th></th>
						</tr>
					</thead>
					<tbody id="featureBody">
						
					</tbody>
					<tfoot>
						<tr>
							<td colspan="3" align="right">
								<button type="button" class="btn btn-primary" onclick="addFeature()" title="Add Feature">
									<i class="fas fa-plus"></i>
								</button>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>

			<div id="discount">
				<table class="table discount table-bordered table-striped table-sm">
					<thead class="thead-light">
						<tr>
							<th>Min Quantity</th>
							<th>Discount</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th></th>
						</tr>
					</thead>
					<tbody id="discountBody">
						
					</tbody>
					<tfoot>
						<tr>
							<td colspan="5" align="right">
								<button type="button" class="btn btn-primary" 
								onclick="addDiscount()" title="Add Discount">
									<i class="fas fa-plus"></i>
								</button>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
			</form>

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
				        <h6>You May Upload Ten Images At Most.</h6>
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

				<div class="modal fade" id="selectOptionNumber" tabindex="-1" role="dialog" 
				aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLongTitle"><font class="star">Select Number!</font></h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <h6>Please select number of nested option group.</h6>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>
		</div>
	</div>
	

	<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/decoupled-document/ckeditor.js"></script>
	<!--<script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>-->
    <script type="text/javascript" src="{{ asset('js/admin/catalog/product/prevent.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/catalog/product/slider.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/admin/catalog/product/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/catalog/product/general.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/catalog/product/data.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/catalog/product/links.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/catalog/product/option.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/catalog/product/single.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/catalog/product/nested.js') }}"></script>
    <!--<script type="text/javascript" src="{{ asset('js/admin/catalog/product/map.js') }}"></script>-->
    <script type="text/javascript" src="{{ asset('js/admin/catalog/product/image.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/catalog/product/feature.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/catalog/product/discount.js') }}"></script>
@endsection