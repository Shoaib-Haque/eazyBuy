@extends('layouts/adminlayout')
@section('brands')
	<div class="main">
		<h3>
			<span class="normal">Brands</span>
			<div class="button-group">
				<a href="/admin/catalog/brand/add">
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
			<i class="fas fa-list"></i> Brand List
		</div>

		<div class="table-div">
			<table class="table table-hover table-sm">
				<thead>
				    <tr>
				    	<th class="name-th">Brand Name</th>
						<th class="btn-th">Action</th>
				    </tr>
				</thead>
				<tbody>
					@foreach($brandlist as $key => $value)
						<tr>
							<td class="name-td">{{ $value->name }}</td>
							<td class="btn-td"><a href="/admin/catalog/brand/edit/{{ $value->id }}">
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