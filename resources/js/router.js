import { createRouter, createWebHistory } from 'vue-router'


const route= new createRouter({

    history: createWebHistory(),

    routes: [
        {
            path: '/users',
            component: () => import('./components/Users/Users.vue'),
            name: 'users'
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
        },
        {
            path: '/users/home',
            component: () => import('./components/User/Home.vue'),
            name: 'users.home'
        },
        {
            path: '/:pathMatch(.*)*',
            component: () => import('./components/User/Home.vue'),
            name: '404'
        }
    ]
})

route.beforeEach((to,from,next) => {
    const authorisationToken = localStorage.getItem('authorisation_token')

    if(!authorisationToken){
        if(to.name === 'users.login' || to.name === 'users.registration'){
            return next()
        }else{
            return next({
                name: 'users.login'
            })
        }
    }

    if(to.name === 'users.login' || to.name === 'users.registration' &&  authorisationToken ) {
        return next({
            name: 'users.home'
        })
    }

    next();
})

export default route
