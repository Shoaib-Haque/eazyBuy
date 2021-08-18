<template>
    <main>
        <div>
            <div v-for="product in products">
                <img :src="'/images/product/'+product.image" style="height:30px; width:30px">
                <!--<router-link :to='{name:"productshow",params:{proId:product.id}}'>{{product.name}}</router-link>-->
                <a :href="'/customer/product/'+product.id">{{product.name}}</a>
            </div>
        </div>
        <div>
            <router-view></router-view>
        </div>
    </main>
</template>

<script>
export default {
    name:"products",
    data(){
        return {
            products:[]
        }
    },
    mounted(){
        this.getProducts()
    },
    methods:{
        async getProducts(){
            await this.axios.get('/api/customerhome').then(response=>{
                this.products = response.data
            }).catch(error=>{
                console.log(error)
                this.products = []
            })
        },
    }
}
//<img src="{{'/images/product/'. product.image}}">
</script>