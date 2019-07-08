<template>
    <div class="card">
        <div class="card-body">
            <form @submit="handleSubmit">
                <div class="form-row align-items-center">
                <div class="col-4">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" :class="errors.name ? 'is-invalid' : ''" id="name" placeholder="Name" v-model="product.name" :data-ewan="JSON.stringify(errors)">
                    <div class="invalid-feedback">
                        <span v-if="errors.name">{{ errors.name[0] }}</span>
                        <span v-else>&nbsp;</span>
                    </div>
                </div>

                <div class="col-3">
                    <label for="quantity">Quantity</label>
                    <input type="text" class="form-control" :class="errors.quantity ? 'is-invalid' : ''" id="quantity" placeholder="1" v-model="product.quantity">
                    <div class="invalid-feedback">
                        <span v-if="errors.quantity">{{ errors.quantity[0] }}</span>
                        <span v-else>&nbsp;</span>
                    </div>
                </div>

                <div class="col-3">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" :class="errors.price ? 'is-invalid' : ''" id="price" placeholder="20" v-model="product.price">
                    <div class="invalid-feedback">
                        <span v-if="errors.price">{{ errors.price[0] }}</span>
                        <span v-else>&nbsp;</span>
                    </div>
                </div>
                    <div class="col-auto">
                        <div style="height: 18px"></div>
                        <button type="submit" class="btn btn-primary mb-2" style="width: 100%">Submit</button>
                    </div>
                </div>
            </form>

            <div class="alert alert-success" v-if="message">
                {{ message }}
            </div>
        </div>
    </div>
</template>

<script>
    import { mapActions } from 'vuex'

    export default {
        name: "AddProduct",
        data() {
            return {
                product: {
                    name: '',
                    price: '',
                    quantity: ''
                },
                errors: {},
                message: ''
            }
        },
        methods: {
            ...mapActions(['addProduct']),
            handleSubmit(event) {
                event.preventDefault()

                this.addProduct(this.product).then(response => {
                    this.errors = {}
                    this.product = { name: '', price: '', quantity: '' }
                    this.message = response.message
                }).catch(data => {
                    this.errors = data.errors
                })
            }
        }
    }
</script>

<style scoped>
    .invalid-feedback {
        display: block;
    }
</style>
