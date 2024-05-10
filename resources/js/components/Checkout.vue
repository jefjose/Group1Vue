<template>
    <div>
        <div class="container checkoutBox">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
                    <div class="box">
                        <h3 class="box-title">Products in your Cart</h3>
                        
                        <!-- Check if cart is empty -->
                        <div v-if="items.length === 0">
                            <h1>No Items In Cart</h1>
                        </div>
                        <!-- If cart is not empty, display cart items -->
                        <div v-else>
                            <div class="plan-selection" v-for="item in items" :key="item.id">
                                <div class="plan-data" v-if="item.name">
                                    <input id="question1" name="question" type="radio" class="with-font" value="sel" />
                                    <label for="question1">{{item.name}}</label>
                                    <p class="plan-text">Quantity: {{item.quantity}}</p>
                                    <span class="plan-price">Price: ₱{{item.price}}</span>
                                    <button @click="deleteItem(item.id)">Delete</button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Shipping method and payment section -->
                        <div v-if="items.length > 0">
                            <!-- ... -->
                            <div class="panel panel-info">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <h4>Shipping Address</h4>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                <div class="col-md-12">
                                    <strong>First Name:</strong>
                                    <input type="text" name="first_name" v-model="firstname" class="form-control" value="" />
                                </div>
                                <br>
                                <div class="span1"></div>
                                <div class="col-md-12">
                                    <strong>Last Name:</strong>
                                    <input type="text" name="last_name" v-model="lastname" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Full Address:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" v-model="address" class="form-control" value="" />
                                </div>
                            </div>                     
                            <div class="form-group">
                                <div class="col-md-12"><strong>Phone Number:</strong></div>
                                <div class="col-md-12"><input type="text" name="phone_number" v-model="phone" class="form-control" value="" /></div>
                            
                            </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <h4>Payment is strictly COD (Cash on Delivery)</h4>
                                <br>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-submit-fix" @click.prevent="postCheckout()">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order summary -->
                <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12" v-if="items.length > 0">
                    <!-- Order summary content -->
                    <div class="widget">
                        <h4 class="widget-title">Order Summary</h4>
                        <!-- Order summary block -->
                        <div class="summary-block" v-for="summaryItem in items" :key="summaryItem.id">
                            <div class="summary-content" v-if="summaryItem.name">
                                <div class="summary-head">
                                    <h5 class="summary-title">{{ summaryItem.name }}</h5>
                                </div>
                                <div class="summary-price">
                                    <p class="summary-text"> = ₱{{ summaryItem.total }}</p>
                                    <span class="summary-small-text pull-right">{{ summaryItem.quantity }} x ₱{{ summaryItem.price }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Total summary block -->
                        <div class="summary-block">
                            <div class="summary-content">
                                <div class="summary-head">
                                    <h5 class="summary-title">Total</h5>
                                </div>
                                <div class="summary-price">
                                    <p class="summary-text">₱{{ totalAmount }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of order summary -->

            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            items: [],
            firstname: '',
            lastname: '',
            phone: '',
            address: ''
        };
    },
    methods: {
        async getCartItems() {
            try {
                const response = await axios.get('/checkout/get/items');
                this.items = response.data;
            } catch (error) {
                console.error('Error fetching cart items:', error);
            }
        },
        async deleteItem(itemId) {
            try {
                const response = await axios.delete(`/delete-item/${itemId}`);
                console.log('Item deleted:', response.data);
                this.getCartItems();
            } catch (error) {
                console.error('Error deleting item:', error);
            }
        },
        async postCheckout() {
            try {
                const orderResponse = await axios.post('/checkout/store', {
                    firstname: this.firstname,
                    lastname: this.lastname,
                    phone: this.phone,
                    address: this.address,
                    items: this.items
                });

                console.log('Order placed successfully:', orderResponse.data);
                alert('Order placed successfully');

                const clearCartResponse = await axios.post('/clear-cart');
                console.log('Cart cleared:', clearCartResponse.data);

                window.location.href = '/';
            } catch (error) {
                console.error('Error placing order:', error);
                alert('Failed to place order. Please try again later.');
            }
        }
    },
    computed: {
        totalAmount() {
            return this.items.reduce((total, item) => total + item.total, 0);
        }
    },
    created() {
        this.getCartItems();
    }
};
</script>
