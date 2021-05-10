<!DOCTYPE html>
@extends('layouts/adminlayout')
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="{{asset('css/admin/addproduct.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('css/admin/addproducteditor.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('css/admin/uploadImage.css')}}" type="text/css">
</head>
<body>
	@section('addproduct')
	<div class="main">
		<h1>
			<span class="normal">Products</span>
			<div class="button-group">
				<form method="POST">
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
			<div class="buttons">
				<nav class="navbar navbar-light bg-light navbar-button">
					<a onclick="divVisibility('general');" class="btn btn-light">General</a>
					<a onclick="divVisibility('data');" class="btn btn-light">Data</a>
					<a onclick="divVisibility('links');" class="btn btn-light">Links</a>
					<a onclick="divVisibility('price');" class="btn btn-light">Price</a>
					<a onclick="divVisibility('image');" class="btn btn-light">Image</a>
					<a onclick="divVisibility('features');" class="btn btn-light">Features</a>
				</nav>
			</div>

			<div id="general">
				<table>
			    	<tr>
			        	<td class="td-left"><strong><font class="star">*</font>Product Name</strong></td>
			            <td class="td-right"><input type="text" name="name"></td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

			        <tr>
			        	<td class="td-left"><strong>Description</strong></td>
			            <td class="td-right">
			            	<div id="toolbar-container"></div>
        					<div id="editor"></div>
        					<input type="hidden" name="des" id="des" value="">
			            </td>
			        </tr>
			    </table>
			</div>

			<div id="data">
				<table>
			    	<tr>
			        	<td class="td-left"><strong>Size</strong></td>
			            <td class="td-right"><input type="text" name="size"></td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

			        <tr>
			        	<td class="td-left"><strong>Weight</strong></td>
			            <td class="td-right"><input type="text" name="weight"></td>
			        </tr>
			    </table>
			</div>

			<div id="links">
				<table>
					<tr>
			        	<td class="td-left"><strong><font class="star">*</font>Department</strong></td>
			            <td class="td-right">
			            	<select name="deptid">
			            		<option>Select Department</option>
			            	</select>
			            </td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

					<tr>
			        	<td class="td-left"><strong><font class="star">*</font>Category</strong></td>
			            <td class="td-right">
			            	<select name="categoryid">
			            		<option>Select Category</option>
			            	</select>
			            </td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
			        <tr><td colspan="2"></td></tr>

			        <tr>
			        	<td class="td-left"><strong><font class="star">*</font>Brand</strong></td>
			            <td class="td-right">
			            	<select name="brandid">
			            		<option>Select Brand</option>
			            	</select>
			            </td>
			        </tr>
			    </table>
			</div>

			<div id="price">
				<table>
					<tr>
			        	<td class="td-left"><strong><font class="star">*</font>Selling Price</strong></td>
			            <td class="td-right"><input type="number" name="price"></td>
			        </tr>

			        <tr class="border_bottom"><td colspan="2"></td></tr>
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

			        <tr class="border_bottom"><td colspan="3"></td></tr>

				</table>
			</div>

			<div id="features">
				<table>
					<tr>
						<td>Feature Name</td>
						<td></td>
					</tr>
				</table>
			</div>
			</form>
		</div>
	</div>

	<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/decoupled-document/ckeditor.js" async></script>
	<script src="{{ asset('js/admin/addproducttoolbar.js') }}" async></script>
	<script src="{{ asset('js/admin/addproducteditor.js') }}" async></script>
	<script src="{{ asset('js/admin/uploadImage.js') }}" async></script>
    @endsection
</body>
</html>