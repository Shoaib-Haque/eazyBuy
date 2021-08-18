const Products = () => import('./components/customer/home/Index.vue' /* webpackChunkName: "resource/js/components/customer/home/Index" */)
const ProductShow = () => import('./components/customer/product/Index.vue' /* webpackChunkName: "resource/js/components/customer/product/Index" */)


export const routes = [
    {
        name: 'Products',
        path: '/customer/home',
        component: Products
    },
    {
        name: 'productshow',
        path: '/customer/product/:proId/show',
        component: ProductShow,
        props: true      
    },
]