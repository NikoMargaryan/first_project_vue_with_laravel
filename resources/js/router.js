import { createRouter, createWebHistory } from 'vue-router'


const route= new createRouter({
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
        },
        {
            path: '/users/personal',
            component: () => import('./components/User/Personal.vue'),
            name: 'users.personal'
        },
        {
            path: '/:pathMatch(.*)*',
            component: () => import('./components/User/Personal.vue'),
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
            name: 'users.personal'
        })
    }

    next();
})

export default route
