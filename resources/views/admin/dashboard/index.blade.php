@extends('layouts.adminlayout')
@section('index') 
	<div class="main">
		<h3>
			<span class="normal">Dashboard</span>
		</h3>
	</div>

	<hr class="full">
	<div class="main list">
		<div id="app">
  			<input @keyup="doSomething" v-model="name" type="text" placeholder="Enter your name">
		</div>
	</div>

	<script type="text/javascript">
		new Vue({
		    el: '#app',

		    data: {
		        name: ''
		    },

		    methods: {
		        doSomething() {
		        	console.log('Hello '+ this.name);
		    	}
		    }
		});
	</script>
@endsection 