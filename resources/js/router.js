import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const router = new VueRouter({
    mode:'history',
    routes:[
        {
            path:'/fruit', component: () => import('./components/Fruit/Index'),
            name: 'fruit.index'
        },
        {
            path:'/users/login', component: () => import('./components/User/Login'),
            name: 'user.login'
        },
        {
            path:'/users/registration', component: () => import('./components/User/Registration'),
            name: 'user.registration'
        },
        {
            path:'/users/personal', component: () => import('./components/User/Personal'),
            name: 'user.personal'
        },
        {
            path: '*', component: () => import('./components/User/Personal'),
            name: '404'
        }

    ]
})

router.beforeEach((to,from,next)=>{
    const accessToken = localStorage.getItem('access_token')

    if (!accessToken){
        if(to.name === 'user.registration' || to.name === 'user.login') {
            return next()
        } else {
            return next({
                name: 'user.login'
            })
        }
    }

    if (to.name == 'user.login' || to.name == 'user.registration' && accessToken){
        return next({
            name: 'user.personal'
        })
    }
    next()
})

export default router
