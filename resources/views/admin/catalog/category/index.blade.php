@extends('layouts/adminlayout')
@section('categories')
	<link rel="stylesheet" type="text/css" href="{{asset('css/admin/catalog/category/style.css')}}">
	<div class="main">
		<h3>
			<span class="normal">Categories</span>
			<div class="button-group">
				<a href="/admin/catalog/category/add">
					<button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Add New">
						<i class="fas fa-plus"></i>
					</button>
				</a>
			</div>
		</h3>
	</div>

	<hr class="full">
	<div class="main list">
		<div class="heading">
			<i class="fas fa-list"></i> Category List
		</div>

		<div class="table-div ">
			<table class="table">
				<tbody>
					@php
						$dept = "";
					@endphp
					@foreach($categorylist as $key => $value)
						<tr>
							@if($value->dtitle != $dept)
								@php $dept = $value->dtitle; @endphp
								<tr class="header">
									<td colspan="2">
										<button type="button" class="btn-collapse"><span>+</span></button> {{ $value->dtitle }}
									</td>
								</tr>
							@endif
							<tr>
					  			<td class="td-cat">{{ $value->title }}</td>
					  			<td class="btn-td">
					  				<a href="/admin/catalog/category/edit/{{ $value->id }}">
										<button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" 
										data-placement="top" title="Edit">
											<i class="fas fa-pencil-alt"></i>
										</button>
									</a>
								</td>
					  		</tr>
						</tr> 
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<script type="text/javascript" src="{{ asset('js/admin/catalog/category/index/main.js') }}"></script>
@endsection