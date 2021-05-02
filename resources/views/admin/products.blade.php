<!DOCTYPE html>
@extends('layouts.adminlayout')
<html>
<head>
	<title></title>
</head>
<body>
	@section('products')
	<a href="/admin/addproduct">Add Product</a>
	<table>
		@foreach($productlist as $productlist)
	        <tr>
	            <td>{!! html_entity_decode($productlist->des, ENT_QUOTES, 'UTF-8') !!} </td>
	        </tr>
	    @endforeach
	</table>
	@endsection
</body>
</html>