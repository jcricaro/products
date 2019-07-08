<template>
    <table class="table">
        <thead>
            <tr>
                <th>
                    Name
                </th>
                <th>
                    Price
                </th>
                <th>
                    Quantity
                </th>
                <th>
                    Date Sumitted
                </th>
                <th>
                    Total Price
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="product in products">
                <td>
                    {{ product.name }}
                </td>
                <td>
                    {{ product.price }}
                </td>
                <td>
                    {{ product.quantity }}
                </td>
                <td>
                    {{ formatDate(product.created_at) }}
                </td>
                <td>
                    {{ totalValue(product.price, product.quantity) }}
                </td>
            </tr>
        </tbody>
        <tfoot>
        <tr>
            <th colspan="4" text-align="right">
                Total
            </th>
            <th>
                {{ sumTotalValue }}
            </th>
        </tr>
        </tfoot>
    </table>
</template>

<script>
    import { mapGetters } from 'vuex'
    import { parse, distanceInWordsStrict } from 'date-fns'

    export default {
        name: "ProductList",
        computed: {
            ...mapGetters(['products']),
            sumTotalValue() {
                let total = 0

                this.products.forEach(product => {
                    total = total + this.totalValue(product.price, product.quantity)
                })

                return total
            }
        },
        methods: {
            totalValue($price, $quantity) {
                return $price * $quantity
            },
            formatDate(date) {
                return distanceInWordsStrict(parse(date), new Date()) + ' ago';
            }
        }
    }
</script>

<style scoped>

</style>
