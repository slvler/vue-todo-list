import { createRouter, createWebHistory } from 'vue-router'

import productsIndex from "../components/products/index.vue";

const routes = [
    {
        path: '/',
        component: productsIndex,
        name: 'product.index'
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})


export default router
