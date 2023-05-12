import {createRouter, createWebHistory} from 'vue-router'
import store from '@/store/store';

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/dashboard',
            name: 'dashboard',
            component: () => import('../components/Dashboard.vue'),
            meta: {
                middleware: 'auth',
            },
            children: [
                {
                    name: 'dashboard',
                    path: '/',
                    component: () => import('../components/Dashboard.vue'),
                    meta: {
                        title: `Dashboard`
                    }
                }
            ]
        },
        {
            path: '/login',
            name: 'login',
            component: () => import('../components/Login.vue'),
            meta: {
                middleware: "guest",
                title: `Login`
            }
        }
    ]
})

router.beforeEach((to, from, next) => {
    document.title = to.meta.title
    if (to.meta.middleware == "guest") {
        if (store.state.auth.isAuthenticated) {
            next({ name: "dashboard" })
        }
        next()
    } else {
        if (store.state.auth.isAuthenticated) {
            next()
        } else {
            next({ name: "login" })
        }
    }
})

export default router