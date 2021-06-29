@extends('layouts.adminlayout')
@section('products')
	<div class="main">
		<h3>
			<span class="normal">Products</span>
			<div class="button-group">
				<a href="/admin/catalog/product/add">
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
			<i class="fas fa-list"></i> Product List
		</div>
		<div class="table-div">
			<table class="table table-hover table-sm">
				<thead>
				    <tr>
				    	<th class="name-th">Product Name</th>
						<th class="btn-th">Action</th>
				    </tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
	</div>

@endsection