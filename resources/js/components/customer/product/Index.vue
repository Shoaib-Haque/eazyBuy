<template>
    <div style="padding: 5px;">
        <a v-if="proSubcategory" href="#">{{proSubcategory}}</a><br>
        <div class="container-fluid">
            <div class="row justify-content-start">
                <div class="col-6 no-gutters">
                    <div class="row">
                        <div class="col-3 no-gutters">
                            <div class="extra-image">
                                <img v-for="optionImage in optionImages"
                                :src="'/images/product/'+optionImage.img_name"
                                @mouseover="mouseOverExtraImage( $event, optionImage.img_name )" >
                            </div>
                        </div>

                        <div class="col-5 no-gutters product-image">
                            <div class="img-zoom-container" @mouseleave="hideZoom($event)" @mouseenter="imageZoom($event)">
                                <img v-if="productImg" :src="productImg" class="product-image" >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 no-gutters">
                    <div class="row">
                        <div class="col-8">
                                <div id="zoom-result" class="img-zoom-result"></div>
                                <a v-if="productBrand" href="#">Visit the {{productBrand}} store</a><br>
                                <span>{{productName}}</span>
                                <hr>
                                <label div v-if="productPrice">Price: ${{productPrice}}</label>

                            <div v-for="(n,index) in optionTypesLength">
                                <div v-if="optionTypes[index].input_type == 'Select'">
                                    <label>{{optionTypes[index].type}}: </label><br>

                                    <select @change="onChange( $event, optionTypes[index].type )" v-bind:name="optionTypes[index].type">
                                        <option value="">Select {{optionTypes[index].type}}</option>
                                        <option v-for="option in options[index]" :selected= "option.is_default == 'Yes'" :value="option.option">
                                            {{option.option}}
                                        </option>
                                    </select>
                                </div>

                                <div v-if="optionTypes[index].input_type == 'Radio Button'">            
                                    <div>
                                        <label>{{optionTypes[index].type}}: </label>
                                        <span v-for='option in options[index]'>
                                            <label v-if="option.is_default == 'Yes'" 
                                            v-bind:id="optionTypes[index].type">{{option.option}}</label>
                                            <input v-if="option.is_default == 'Yes'" type="hidden" 
                                            v-bind:name="optionTypes[index].type" >
                                        </span>
                                    </div>

                                    <div class="select-option" style="display:inline-block;">
                                    <img v-for="optionImage in computedOptionImages[index]" :class="optionImage.class"
                                    :src="'/images/product/'+optionImage.img_name"
                                    @click="onClick( $event, optionImage.option, optionTypes[index].type, optionImage.img_name )"
                                    @mouseover="mouseOverImage( optionImage.option, optionTypes[index].type, optionImage.img_name)"
                                    @mouseout="mouseOutImage( optionTypes[index].type, optionImage.img_name )"
                                    :title="'Click to select '+optionImage.option"> 
                                    </div>
                                </div>       
                            </div> 
                        </div>
                        <label div v-if="productPrice">Price: {{productPrice}}</label>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="productDescription">
            Product description<br>
            <div v-if="productDescription" v-html=productDescription></div>
        </div>

        <!--<li v-for='outerOption in options' >
            <span v-for='innerOption in outerOption'>
              {{ innerOption.option }}
            </span>
        </li>-->

        <div>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
//import debounce from 'lodash/debounce'
export default {
    data(){
        return {
            product:[],
            productName: "",
            productDescription: "",
            productImg:"",
            productTempImg:"",
            productPrice: "",
            productBrand:"",
            proSubcategory:"",
            optionTypes:[],
            options:[],
            optionSelectImages:[],
            optionImages:[],
            optionTypesLength:0,
            proId: window.location.href.split("/").pop(),  
        }
    },
    mounted(){
        this.showProduct();
    },
    updated: function() {
        var flag;
        for (var i = 0; i < this.optionTypesLength; i++) {
            flag = false;
            if (this.optionTypes[i].input_type == "Radio Button" && 
                document.getElementsByName(this.optionTypes[i].type)[0].value == "") {
                for (var j = 0; j < this.options[i].length; j++) {
                    if (this.options[i][j].is_default == "Yes") {
                        document.getElementsByName(this.optionTypes[i].type)[0].value = this.options[i][j].option;
                        flag = true;
                    }
                }
                if (!flag) {
                    document.getElementsByName(this.optionTypes[i].type)[0].value = this.options[i][0].option;
                }
            }
        }

        var activeNode = document.getElementsByClassName('active');
        if (activeNode.length == 0) {
            var images = document.querySelectorAll(".extra-image > img");
            if (images.length >= 1) {
                images[0].className = "active";
            }
        }
    },
    computed: {
        computedOptionImages() {
            var computedOptionSelectImages = {};
            for (var i = 0; i < this.optionTypes.length; i++) {
                if (this.optionTypes[i].input_type == "Radio Button") {
                    computedOptionSelectImages[i] = {};
                    for (var j = 0; j < this.options[i].length; j++) {
                        for (var k = 0; k < this.optionSelectImages.length; k++) {
                            if (this.optionSelectImages[k].option_id == this.options[i][j].id) {
                                this.optionSelectImages[k].option = this.options[i][j].option;
                                if (this.options[i][j].is_default == 'Yes') {
                                    this.optionSelectImages[k].class = 'selected-image';
                                }
                                else {
                                    this.optionSelectImages[k].class = '';
                                }
                                computedOptionSelectImages[i][k] = this.optionSelectImages[k];
                            }
                        }
                    }
                }
            }
            return computedOptionSelectImages;
        },
    },
    methods:{
        async showProduct(){
            await this.axios.get(`/api/customer/product/${this.proId}`).then(response=>{
                this.product = response.data;
                this.productName = this.product.productInfo.name;
                this.productDescription = this.product.productDescription;
                this.productImg = '/images/product/'+this.product.productImg.img_name;
                this.productTempImg = '/images/product/'+this.product.productImg.img_name;
                this.productPrice = this.product.productInv.unit_selling_price;
                this.productBrand = this.product.proBrand.name;
                this.proSubcategory = this.product.proSubcategory.title;
                this.optionTypes = this.product.optionTypes;
                this.optionTypesLength = this.optionTypes.length;
                this.options = this.product.options;
                this.optionSelectImages = this.product.optionImages;

                for (var i = 0; i < this.optionTypesLength; i++) {
                    if (this.optionTypes[i].input_type == "Radio Button") {
                        for (var j = 0; j < this.options[i].length; j++) {
                            if (this.options[i][j].is_default == "Yes") {
                                for (var k = 0; k < this.optionImages.length; k++) {
                                    if (this.optionImages[k].option_id == this.options[i][j].id) {
                                        this.productImg = '/images/product/'+this.optionImages[k].img_name;
                                        this.productTempImg = '/images/product/'+this.optionImages[k].img_name;
                                    }
                                }
                            }
                        }
                    }
                }

                this.makeCombination(true);
            }).catch(error=>{
                console.log(error)
            })
        },
        getPrice(combination){
            if(combination != ""){
                axios.get('/api/product/price',{params: {combination: combination, proId: this.proId}}).then(response => {
                    if (response.data.unit_selling_price) {
                        this.productPrice = response.data.unit_selling_price;
                    }
                });
            }
        },
        getImage(combination) {
            if (combination != "") {                    
                axios.get('/api/product/image',{params: {combination: combination, proId: this.proId}}).then(response => {
                    this.optionImages = response.data;
                    this.productImg = '/images/product/'+response.data[0].img_name;  
                    this.productTempImg = '/images/product/'+response.data[0].img_name;
                });
            }
        },
        makeCombination( getImageFlag ) {
            var optionTypes;
            this.axios.get('/api/product/optiontypes',{params: {proId: this.proId}}).then(response => {
                optionTypes = response.data;
                var combination = "";
                //if (data != "") {
                var flag = true;
                for (var i = 0; i < this.optionTypesLength; i++) {
                    if (document.getElementsByName(this.optionTypes[i].type)[0].value != "" && 
                        typeof(document.getElementsByName(this.optionTypes[i].type)[0].value) != 'undefined') {
                        if (i == (optionTypes.length - 1)) {
                            combination += document.getElementsByName(this.optionTypes[i].type)[0].value;
                        }
                        else {
                            combination += document.getElementsByName(this.optionTypes[i].type)[0].value+"-";
                        }

                        if (optionTypes[i].input_type == "Radio Button") {
                            document.getElementById(this.optionTypes[i].type).innerText = 
                            document.getElementsByName(this.optionTypes[i].type)[0].value;
                        }
                    }
                    else {
                        this.productPrice = "Please Select "+optionTypes[i].type;
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
        mouseOverExtraImage( event, image ) {
            this.productImg = '/images/product/'+image;
            this.productTempImg = '/images/product/'+image;
            var activeNode = document.getElementsByClassName('active');
            for (var i = 0; i < activeNode.length; i++) {
                activeNode[i].className = "";
            }
            event.target.className = "active";
        },
        onChange( event, label ) {
            var val = event.target.value;
            if(val != "") {
                this.makeCombination(false);
            }
            else {
                this.productPrice = "Please Select "+label;
            }
        },
        onClick( event, val, label, image ) {
            document.getElementsByName(label)[0].setAttribute("value", val);
            document.getElementById(label).innerHTML = document.getElementsByName(label)[0].value;
            this.productImg = '/images/product/'+image;
            this.productTempImg = '/images/product/'+image; 
            var activeNode = document.getElementsByClassName('active');
            for (var i = 0; i < activeNode.length; i++) {
                activeNode[i].className = "";
            }
            this.makeCombination(true);
            var selectedNode = document.getElementsByClassName('selected-image');
            for (var i = 0; i < selectedNode.length; i++) {
                selectedNode[i].className = "";
            }
            event.target.className = "selected-image";
        },
        mouseOutImage( label, image ) {
            this.productImg = this.productTempImg;
            document.getElementById(label).innerHTML = document.getElementsByName(label)[0].value;
        },
        mouseOverImage( val, label, image ) { 
            var flag = false;
            for (var i = 0; i < this.optionImages.length; i++) {
                if (image == this.optionImages[i].img_name) {
                    flag = true;
                }
            }

            if (!flag) {
                this.productImg = '/images/product/'+image; 
                document.getElementById(label).innerHTML = val;
            }
        },
        imageZoom(event) {
            var img, lens, result, resultWidth, resultHeight ,cx, cy;  
            //img = event.target;
            img = event.target.querySelector('img');
            //console.log(event);
            result = document.getElementById("zoom-result");
            result.style.display = "block";
            /*create lens:*/
            lens = document.createElement("DIV");
            lens.setAttribute("class", "img-zoom-lens");
            /*insert lens:*/
            img.parentElement.insertBefore(lens, img);
            /*calculate the ratio between result DIV and lens:*/
            resultWidth = result.offsetWidth;
            resultHeight = result.offsetHeight;
            cx = resultWidth / lens.offsetWidth;
            cy = resultHeight / lens.offsetHeight;
            /*set background properties for the result DIV:*/
            result.style.backgroundImage = "url('" + img.src + "')";
            result.style.backgroundRepeat = "no-repeat";
            result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
            /*execute a function when someone moves the cursor over the image, or the lens:*/
            lens.addEventListener("mousemove", moveLens);
            img.addEventListener("mousemove", moveLens);
            /*and also for touch screens:*/
            lens.addEventListener("touchmove", moveLens);
            img.addEventListener("touchmove", moveLens); 

            function moveLens(e) {
                var pos, x, y;
                /*prevent any other actions that may occur when moving over the image:*/
                e.preventDefault();
                /*get the cursor's x and y positions:*/
                pos = getCursorPos(e);
                /*calculate the position of the lens:*/
                x = pos.x - (lens.offsetWidth / 2);
                y = pos.y - (lens.offsetHeight / 2);

                /*prevent the lens from being positioned outside the image:*/
                if (x > img.width - lens.offsetWidth) {
                    x = img.width - lens.offsetWidth;  
                } 

                if (x < 0) {
                    x = 0;
                }

                if (y > img.height - lens.offsetHeight) {
                    y = img.height - lens.offsetHeight; 
                }

                if (y < 0) {
                    y = 0;
                }
                /*set the position of the lens:*/
                lens.style.left = x + "px";
                lens.style.top = y + "px";
                /*display what the lens "sees":*/
                result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
            }
            function getCursorPos(e) {
                var a, x = 0, y = 0;
                e = e || window.event;
                /*get the x and y positions of the image:*/
                a = img.getBoundingClientRect();
                /*calculate the cursor's x and y coordinates, relative to the image:*/
                x = e.pageX - a.left;
                y = e.pageY - a.top;
                /*consider any page scrolling:*/
                x = x - window.pageXOffset;
                y = y - window.pageYOffset;
                return {x : x, y : y};
            }
        },
        hideZoom(event) {
            //this is the original element the event handler was assigned to
            var e = event.toElement || event.relatedTarget;
            if (e) {
                if (e.parentNode == this || e == this) {
                    return;
                }   
            }
            
            // handle mouse event here!     
            var result = document.getElementById('zoom-result');
            result.style.display = "none";
            var lens = document.getElementsByClassName('img-zoom-lens');
            if (lens) {
                for (var z = 0; z < lens.length; z++) {
                    lens[z].remove();
                }
            }
        }
    }
}
</script>