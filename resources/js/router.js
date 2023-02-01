import { createRouter, createWebHistory } from 'vue-router'
export default new createRouter({
    history: createWebHistory(),

    routes: [
        {
            path: '/fruits',
            component: () => import('./components/Fruit/Index.vue'),
            name: 'fruit.index'
        },
        {
            path: '/users/login',
            component: () => import('./components/User/Login.vue'),
            name: 'users.login'
        },
        {
            path: '/users/registration',
            component: () => import('./components/User/Registration.vue'),
            name: 'users.registration'
        }
    ]
})