import axios from 'axios'

export default {
    state: {
        products: [],
        hasLoaded: false
    },
    getters: {
        products: state => state.products
    },
    actions: {
        fetchProducts({ commit }) {
            return new Promise((resolve, reject) => {
                axios.get('/api/products').then(response => {
                    commit('setProducts', response.data.data)
                    resolve(response.data.data)
                }).catch(error => {
                    reject(error.response.data)
                })
            })
        },
        addProduct({ commit }, product) {
            return new Promise((resolve, reject) => {
                axios.post('/api/products', product).then(response => {
                    commit('addProduct', response.data.data)
                    resolve(response.data)
                }).catch(error => {
                    reject(error.response.data)
                })
            })
        }
    },
    mutations: {
        setProducts: (state, products) => state.products = products,
        addProduct: (state, product) => state.products.splice(0, 0, product)
    }
}
