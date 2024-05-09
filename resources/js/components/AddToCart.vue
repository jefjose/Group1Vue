<template>
    <div>
        <a class="btn btn-primary my-custom-btn" @click.prevent="addProductToCart()"><b>Add to Cart</b></a>
    </div>
</template>

<script>
    export default {
        data(){
            return {};
        },
        props:['productId', 'userId'],
        methods:{
            async addProductToCart(){
                //check if user is logged in
                if(this.userId == 0){
                    alert('Must be logged in to Add To Cart');
                    return;
                }

                //if user is logged in
                let response = await axios.post('/cart', {
                    'product_id': this.productId
                });
                alert("Added to cart");
                this.$root.$emit('changeInCart', response.data.items);
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style scoped>
.my-custom-btn.btn-primary {
  --bs-btn-bg: #FFFFFF !important;
  --bs-btn-border-color: #000000 !important;
  color: #000000 !important; 
}


.my-custom-btn.btn-primary:hover {
  background-color: #000000 !important;
  color: #FFFFFF !important; 
  border-color: black;
}
</style>
