<template>
    <div style="padding: 5px;">
        <span>{{productName}}</span>
        <div v-html=productDescription></div>
        <img v-if="productImg" :src=productImg style="width:100px; height:100px;">
        <img v-if="previewImg" :src=previewImg style="width:100px; height:100px;">

        <li v-for='outerOption in options' >
            <span v-for='innerOption in outerOption'>
              {{ innerOption.option }}
            </span>
        </li>

        <div v-for="(n,index) in optionTypesLength">
            <div v-if="optionTypes[index].input_type == 'Select'">
                <label>{{optionTypes[index].type}}</label>

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
                        <label v-if="option.is_default == 'Yes'" v-bind:id="optionTypes[index].type">{{option.option}}</label>
                        <input v-if="option.is_default == 'Yes'" type="hidden" v-bind:name="optionTypes[index].type" >
                    </span>
                </div>
                <div v-for="option in options[index]" style="display:inline-block;">
                    <div v-for="optionImage in optionSelectImages">
                        <img v-if="optionImage.option_id == option.id" :src="'/images/product/'+optionImage.img_name"
                        @click="onClick( option.option, optionTypes[index].type, optionImage.img_name )"
                        @mouseover="mouseOverImage( option.option, optionTypes[index].type, optionImage.img_name )"
                        @mouseout="mouseOutImage( optionTypes[index].type, optionImage.img_name )"
                        v-bind:title="'Click to select '+option.option"
                        style="width:100px; height:100px;">
                    </div>
                </div>
            </div>       
        </div>

        <label div v-if="productPrice">Price: {{productPrice}}</label>

        <div>
            <img v-for="optionImage in optionImages" :src="'/images/product/'+optionImage.img_name"
            @mouseover="mouseOverOptionImage( optionImage.img_name )"
            style="width:100px; height:100px;">
        </div>

        <div>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import debounce from 'lodash/debounce'
export default {
    data(){
        return {
            product:[],
            productName: "",
            productDescription: "",
            productImg:"",
            productTempImg:"",
            previewImg: "",
            productPrice: "",
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
        mouseOverOptionImage( image ) {
            this.productImg = '/images/product/'+image;
            this.productTempImg = '/images/product/'+image;
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
        onClick( val, label, image ) {
            document.getElementsByName(label)[0].setAttribute("value", val);
            document.getElementById(label).innerHTML = document.getElementsByName(label)[0].value;
            this.productImg = '/images/product/'+image;
            this.productTempImg = '/images/product/'+image;
            this.previewImg = ""; 
            this.makeCombination(true);
        },
        mouseOutImage( label, image ) {
            this.productImg = this.productTempImg;
            this.previewImg = ""; 
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
                this.previewImg = '/images/product/'+image; 
                this.productImg = "";
                document.getElementById(label).innerHTML = val;
            }
        },
    }
}

</script>