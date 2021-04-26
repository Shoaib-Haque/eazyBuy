<!DOCTYPE html>
@extends('layouts.adminlayout')
<html>
<head>
	<title></title>
</head>
</head>
<body>
	@section('index') 
		Welcome, {{session('adminid')}}
		<a href="/logout">Logout</a>
	@endsection 
</body>
</html>