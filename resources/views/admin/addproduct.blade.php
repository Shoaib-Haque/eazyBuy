<!DOCTYPE html>
@extends('layouts/adminlayout')
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="{{asset('css/admin/addproduct.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('css/admin/addproducteditor.css')}}" type="text/css">

	<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/decoupled-document/ckeditor.js"></script>
	<script src="{{ asset('js/admin/addproducttoolbar.js') }}"></script>
</head>
<body>
	@section('addproduct')
	<div class="main_div">
		<div class="buttons">
			<nav class="navbar navbar-light bg-light">
				<a onclick="divVisibility('general');" class="btn btn-light">General</a>
				<a onclick="divVisibility('data');" class="btn btn-light">Data</a>
				<a onclick="divVisibility('image');" class="btn btn-light">Image</a>
			</nav>
		</div>
		
		<div class="inner_div">
			<form method="POST" id="product-form">
			{{ csrf_field() }}
			<div id="general">
				<table>
			    	<tr>
			        	<td>Product Name</td>
			            <td><input type="text" name="name"></td>
			        </tr>
			        <tr>
			        	<td>Description</td>
			            <td>
			            	<div id="toolbar-container"></div>
			            	
        					<div id="editor"></div>
        					<input type="hidden" name="des" id="des" value="">
			            </td>
			        </tr>
			    </table>
			</div>

			<div id="data" style="display: none;">
				<table>
			    	<tr>
			        	<td>Image</td>
			            <td><input type="text" name="image"></td>
			        </tr>
			    </table>
			</div>

			<div id="image" style="display: none;">Image</div>
			
			<input type="submit" id="submit">
			</form>
		</div>
	</div>
	
	<script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
	<script src="{{ asset('js/admin/addproducteditor.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
	@endsection
</body>
</html>