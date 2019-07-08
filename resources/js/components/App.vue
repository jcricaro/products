<template>
    <div class="container">
        <AddProduct />
        <ProductList />
    </div>
</template>

<script>
    import AddProduct from "./AddProduct"
    import ProductList from "./ProductList"
    import { mapActions } from 'vuex'

    export default {
        name: "App",
        components: {
            AddProduct,
            ProductList
        },
        methods: mapActions(['fetchProducts']),
        mounted() {
            this.fetchProducts()
        }
    }
</script>

<style scoped>
    .card {
        margin-top: 64px;
        margin-bottom: 40px;
    }

    .table {
        margin-bottom: 40px;
    }

    .container {
        width: 768px;
    }
</style>
