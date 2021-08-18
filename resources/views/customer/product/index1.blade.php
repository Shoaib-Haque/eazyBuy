@extends('layouts.customerlayout')
@section('product') 
	{{ $productInfo['name'] }}
	<input type="hidden" name="" id="proId" value="{{$productInfo['id']}}">
	{!! html_entity_decode($productInfo['description'], ENT_QUOTES, 'UTF-8') !!}
	<div id="optionImagesSelect"></div>
	<img id="mainimg" src="{{'/images/product/'. $productImg[0]['img_name']}}" 
	style="width: 100px; height: 70px; display: block;">
	<img id="previewimg" style="width: 100px; height: 70px; display: none;">
	<label id="imagename"></label>
	<div id="options">
		@foreach($optionTypes as $optionTypeKey => $optionTypeValue)
			@php
				$lab = $optionTypeValue['type'];
			@endphp
			{{$lab}}
			@if($optionTypeValue['input_type'] == 'Radio Button')
				: <label class="optionLabel" id="{{$lab}}"></label> </br> 
				: <label>{{ $lab }}</label>
			@endif
			
			@if($optionTypeValue['input_type'] == 'Select')
				<select name="{{ $lab }}" @change="onChange($event, {{json_encode($optionTypeValue['type'])}})">
					<option value="">Select {{$optionTypeValue['type']}}</option>
				@foreach($options as $outerOptionKey => $outerOptionValue)
					@foreach($outerOptionValue as $innerOptionKey => $innerOptionValue)
						@if($innerOptionValue['option_type_id'] == $optionTypeValue['id'])
							@if($innerOptionValue['is_default'] == 'Yes')
								<option value="{{$innerOptionValue['option']}}" selected="selected">
								{{$innerOptionValue['option']}}</option>
							@else
								<option value="{{$innerOptionValue['option']}}">{{$innerOptionValue['option']}}</option>
							@endif
						@endif
					@endforeach
				@endforeach
				</select>
				</br>
			@endif

			<!--
			@if($optionTypeValue['input_type'] == 'Radio Button')
				@foreach($options as $outerOptionKey => $outerOptionValue)
					@foreach($outerOptionValue as $innerOptionKey => $innerOptionValue)
						@if($innerOptionValue['option_type_id'] == $optionTypeValue['id'])
							@if($innerOptionValue['is_default'] == 'Yes')
								<input type="radio" name="{{$optionTypeValue['type']}}" value="" checked="checked">{{$innerOptionValue['option']}}
							@else
								<input type="radio" name="{{$optionTypeValue['type']}}" value="">{{$innerOptionValue['option']}}
							@endif
						@endif
					@endforeach
				@endforeach
				</br>
			@endif
			-->

			@if($optionTypeValue['input_type'] == 'Radio Button')
				@php
					$flag = 0;
				@endphp
				@foreach($options as $outerOptionKey => $outerOptionValue)
					@foreach($outerOptionValue as $innerOptionKey => $innerOptionValue)
						@if($innerOptionValue['option_type_id'] == $optionTypeValue['id'])
							@if($innerOptionValue['is_default'] == "Yes")
								<input type="hidden" name="{{$optionTypeValue['type']}}" 
								value="{{$innerOptionValue['option']}}">
								@php
									$flag = 1;
								@endphp
							@endif
						@endif
					@endforeach
				@endforeach

				@foreach($options as $outerOptionKey => $outerOptionValue)
					@foreach($outerOptionValue as $innerOptionKey => $innerOptionValue)
						@if($innerOptionValue['option_type_id'] == $optionTypeValue['id'])
							@foreach($optionImages as $optionImageKey => $optionImageValue)
								@if($flag == 0)
									<input type="hidden" name="{{$optionTypeValue['type']}}" 
									value="{{$innerOptionValue['option']}}">
									@php
										$flag = 1;
									@endphp
								@endif
								@if($optionImageValue['option_id'] == $innerOptionValue['id'])
									<img src="{{'/images/product/'. $optionImageValue['img_name']}}" 
									id="optionImageId{{$optionImageValue['img_name']}}" 
									@click="onClick( {{json_encode($innerOptionValue['option'])}}, {{json_encode($optionTypeValue['type'])}}, {{json_encode($optionImageValue['img_name'])}} )" 
									@mouseover="mouseOverImage( $event, {{json_encode($innerOptionValue['option'])}}, {{json_encode($optionTypeValue['type'])}}, {{json_encode($optionImageValue['img_name'])}} )"
									@mouseout="mouseOutImage({{json_encode($optionTypeValue['type'])}})"
									style="height: 100px; width: 40px;" title="Click to select {{ $innerOptionValue['option'] }}">
								@endif
							@endforeach
						@endif
					@endforeach
				@endforeach
				</br>
			@endif
		@endforeach
		<label>@{{ price }}</label>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script type="text/javascript">
	var app1 = new Vue({
		el: '#options',
		data: {
			Color: 'Hi',
       		price: '',
     	},
		methods: {
			getPrice(combination){
                if(combination != ""){
                	var proId = document.getElementById("proId").value;
                    axios.get('/product/price',{params: {combination: combination, proId: proId}}).then(response => {
                    	if (response.data.unit_selling_price) {
                    		this.price = response.data.unit_selling_price;
                    	}
                    });
                }
            },
            mouseOverOptionImage(e) {
            	var fullPath = e.target.src;
     			var filename = fullPath.replace(/^.*[\\\/]/, '');
            	var image_path = "{{URL::asset('images/product/')}}/";
            	document.getElementById("mainimg").src = image_path+filename; 
            },
            getImage(combination) {
            	if (combination != "") {
            		var proId = document.getElementById("proId").value;
            		var div = document.getElementById("optionImagesSelect");
            		div.innerHTML = '';
                    var image_path="{{URL::asset('images/product/')}}/";
                    
                    axios.get('/product/image',{params: {combination: combination, proId: proId}}).then(response => {
                    	document.getElementById("mainimg").src = image_path+response.data[0].img_name; 
                    	for (var i = 0; i < response.data.length; i++) {
                    		var image = response.data[i].img_name;
                       		var img = document.createElement("img");
                       		img.addEventListener("mouseover",(e)=>{
							    this.mouseOverOptionImage(e)
							})
                       		img.style.width = "70px";
                       		img.style.height = "100px";
							img.src = image_path+image;
							div.appendChild(img);
                    	}                   
                    });
            	}
            },
            makeCombination(getImageFlag) {
            	var optionTypes;
            	var proId = document.getElementById("proId").value;
            	axios.get('/product/optiontypes',{params: {proId: proId}}).then(response => {
                    optionTypes = response.data;
                    var combination = "";
			        //if (data != "") {
			        	var flag = true;
			        	for (var i = 0; i < optionTypes.length; i++) {
				        	if (document.getElementsByName(optionTypes[i].type)[0].value != "" && 
				        		typeof(document.getElementsByName(optionTypes[i].type)[0].value) != 'undefined') {
				        		if (i == (optionTypes.length - 1)) {
				        			combination += document.getElementsByName(optionTypes[i].type)[0].value;
					        	}
					        	else {
					        		combination += document.getElementsByName(optionTypes[i].type)[0].value+"-";
					        	}

					        	if (optionTypes[i].input_type == "Radio Button") {
					        		document.getElementById(optionTypes[i].type).innerText = 
					        		document.getElementsByName(optionTypes[i].type)[0].value;
					        	}
				        	}
				        	else {
				        		document.getElementById("price").innerText = "Please Select "+optionTypes[i].type;
				        		flag = false;
				        	}
				        }
				        if (getImageFlag) {
				       		this.getImage(combination);
				        }
				        
				        if (flag) {
				        	this.getPrice(combination);
				        }
			        //}                
                }); 
            },
		    onChange(event, label) {
		        var data = event.target.value;
		        if(data != "") {
		        	this.makeCombination(false);
		        }
		        else {
		        	document.getElementById("price").innerText = "Please Select "+label;
		        }
		  	},
		  	onClick(val, label, image) {
		  		document.getElementsByName(label)[0].value = val;
		        var image_path = "{{URL::asset('images/product/')}}/";
            	document.getElementById("mainimg").src = image_path+image;  
		        this.makeCombination(true);
		  	},
		  	mouseOutImage(label) {
		  		document.getElementById(label).innerText = document.getElementsByName(label)[0].value;
		  		document.getElementById("mainimg").style.display = "block";  
            	document.getElementById("previewimg").style.display = "none";
		  	},
		  	mouseOverImage( event, val, label, image) {		  		
            	var image_path = "{{URL::asset('images/product/')}}/";
            	document.getElementById(label).innerText = val;
            	//this.label = val;
            	document.getElementById("previewimg").src = image_path+image;  
            	document.getElementById("previewimg").style.display = "block";
            	document.getElementById("mainimg").style.display = "none";
		  	},
		  	getValues: function() {
		  		this.makeCombination(true);
		  	}
	  	},
	  	created: function(){
		   	this.getValues();
		}
	})
	
		     
	</script> 
@endsection 