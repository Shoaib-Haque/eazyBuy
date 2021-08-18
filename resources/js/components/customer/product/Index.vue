<template>
    <div>
        
    </div>
</template>

<script>
export default {
    mounted(){
        this.showProduct();
    },
    methods:{
        async showProduct(){
            await this.axios.get(`/api/customer/product/${this.$route.params.proId}`).then(response=>{
                console.log("hello")
            }).catch(error=>{
                console.log(error)
            })
        },
    }
}
</script>