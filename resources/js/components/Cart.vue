<template>
    <div>
        <li class="nav-item"> 
            <a href="{{ url('/') }}" class="btn btn-warning btn-sm"><b style=""
                                    class="text-uppercase">CART {{itemCount}}</b></a> </li>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                itemCount: '',
            }
        },
        mounted() {
            this.$root.$on('changeInCart', (item) => {
                this.itemCount = item
            })
        }
    }
</script>
