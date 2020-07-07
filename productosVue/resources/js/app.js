require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import HomeComponent from './components/HomeComponent.vue';
import CrearProductoComponent from './components/CrearProductoComponent.vue';
import ListadoProductosComponent from './components/ListadoProductosComponent.vue';
import EditarProductoComponent from './components/EditarProductoComponent.vue';

const routes = [
  {
      name: 'home',
      path: '/',
      component: HomeComponent
  },
  {
      name: 'crear',
      path: '/crear',
      component: CrearProductoComponent
  },
  {
      name: 'productos',
      path: '/productos',
      component: ListadoProductosComponent
  },
  {
      name: 'editar',
      path: '/editar/:id',
      component: EditarProductoComponent
  }
];

const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');