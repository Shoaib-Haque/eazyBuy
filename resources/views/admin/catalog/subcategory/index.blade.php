@extends('layouts/adminlayout')
@section('subcategories')
	<link rel="stylesheet" type="text/css" href="{{asset('css/admin/catalog/subcategory/style.css')}}">
	<div class="main">
		<h3>
			<span class="normal">Subcategories</span>
			<div class="button-group">
				<a href="/admin/catalog/subcategory/add">
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
			<i class="fas fa-list"></i> Subcategory List
		</div>
		<div class="table-div ">
			<table class="table table-sm">
				<tbody>
					@php
						$dept = "";
						$cat = "";
					@endphp
					@foreach($subcategorylist as $key => $value)
						<tr>
							@if($value->dtitle != $dept)
								@php $dept = $value->dtitle; @endphp
								<tr class="dept">
									<td colspan="2">
										<button type="button" class="btn-collapse"><span>+</span></button> {{ $value->dtitle }}
									</td>
								</tr>
							@endif

							@if($value->ctitle != $cat)
								@php $cat = $value->ctitle; @endphp
								<tr class="cat">
									<td colspan="2" class="td-cat">
										<button type="button" class="btn-collapse"><span>+</span></button> {{ $value->ctitle }}
									</td>
								</tr>
							@endif

							<tr class="sub">
					  			<td class="td-sub">{{ $value->title }}</td>
					  			<td class="btn-td">
					  				<a href="/admin/catalog/subcategory/edit/{{ $value->id }}">
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
	<script type="text/javascript" src="{{ asset('js/admin/catalog/subcategory/index/main.js') }}"></script>
@endsection