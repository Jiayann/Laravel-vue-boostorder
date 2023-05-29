require('./bootstrap');

import Vue from "vue";

import Vuex from "vuex";
Vue.use(Vuex);

import VueRouter from "vue-router";
Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        name: 'products.index',
        component: require('./routes/Products/Index.vue').default
    },
    {
        path: '/product/:slug',
        name: 'products.show',
        component: require('./routes/Products/Show.vue').default
    },
    {
        path: '/checkout',
        name: 'order.checkout',
        component: require('./routes/Order/Checkout.vue').default
    },
    {
        path: '/summary',
        name: 'order.summary',
        component: require('./routes/Order/Summary.vue').default
    }
];

const router = new VueRouter({
    mode: 'history',
    routes
    //routes: require('./routes.js')
});

export default router;

const store = new Vuex.Store({
    state:{
        products: [],
        cart: [],
        order: {}
    },

    mutations: {
        updateProducts(state, products){
            state.products = products;
        },
        addToCart(state, product){
            let productInCartIndex = state.cart.findIndex(item => item.slug === product.slug);
            if (productInCartIndex !== -1) {
                state.cart[productInCartIndex].quantity++;
                return;        
            }

            product.quantity = 1;
            state.cart.push(product);
        },

        removeFromCart(state, index){
            state.cart.splice(index, 1);
        },

        updateOrder(state, order) {
            state.order = order;
        },

        updateCart(state, cart){
            state.cart = cart;
        }
    },

    actions: {
        getProducts({ commit }){
            //fetch products and their attached categories from the api
            axios.get('/api/products')
                .then((response) => {
                    commit('updateProducts', response.data);
                })
                .catch((error) => console.error(error));
        },

        clearCart({ commit }){
            commit('updateCart', []);
        }
    }
});


const app = new Vue(
    {   
        router,
        store,
        el:"#app",
        created() {
            store.dispatch('getProducts')
                .then(_ => {})
                .catch((error)=> console.error(error));
        }
        /*
        data: {
            foo: "Hello, world!"
        }
        */
    }
);
