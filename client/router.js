import Vue from 'vue'
import Router from 'vue-router'

// Import Routes
import Index from '~/pages/index'
import Login from '~/pages/auth/login'

Vue.use(Router)

export function createRouter () {
  return new Router({
    mode: 'history',
    routes: [
      {
        path: '/',
        component: Index,
      },
      {
        path: '/auth/login',
        component: Login,
      },
    ],
  })
}
