@extends('layouts.customerlayout')
@section('index') 
		@foreach($proList as $key => $value)
			<img src="{{'/images/product/'. $value['image']}}" style="height: 60px; width: 40px;" />
			<a href="/customer/product/{{$value['id']}}">{{ $value['name'] }}</a>
			{{ $value['price'] }}
		@endforeach
@endsection 