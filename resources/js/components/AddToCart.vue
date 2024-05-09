<template>
    <div>
        <a class="btn btn-primary" @click.prevent="addProductToCart()"><b>Add to Cart</b></a>
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
