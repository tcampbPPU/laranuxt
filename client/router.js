import Vue from 'vue'
import Router from 'vue-router'

// Import Routes
import Index from '~/pages/index'
import Login from '~/pages/auth/login'
import Modal from '~/pages/modal'
import Icon from '~/pages/icon'
import Button from '~/pages/button'
import Toast from '~/pages/toast'

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
        path: '/login',
        component: Login,
      },
      {
        path: '/modal',
        component: Modal,
      },
      {
        path: '/icon',
        component: Icon,
      },
      {
        path: '/button',
        component: Button,
      },
      {
        path: '/toast',
        component: Toast,
      },
    ],
  })
}
