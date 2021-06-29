@extends('layouts/adminlayout')
@section('categories')
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
			<table class="table table-hover table-sm">
				<thead>
				    <tr>
				    	<th>Department</th>
				    	<th class="name-th">Category Name</th>
						<th class="btn-th">Action</th>
				    </tr>
				</thead>
				<tbody>
					@php
						$dept = "";
					@endphp
					@foreach($categorylist as $key => $value)
						<tr>
							@if($value->dtitle != $dept)
							@php $dept = $value->dtitle; @endphp
							<td>{{ $value->dtitle }}</td>
							@else
							<td></td>
							@endif
							<td class="name-td">{{ $value->title }}</td>
							<td class="btn-td"><a href="/admin/catalog/category/edit/{{ $value->id }}">
									<button type="button" class="btn btn-primary" data-toggle="tooltip" 
											data-placement="top" title="Edit">
										<i class="fas fa-pencil-alt"></i>
									</button>
								</a>
							</td>
						</tr> 
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection