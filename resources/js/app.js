/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)


import Levels from './components/Levels'
import Myside from './components/Myside'
import Classrooms from './components/Classrooms'
import Subjects from './components/Subjects'
import Results from './components/Results'
import ResultTable from './components/ResultTable'








const routes = [
    {path: '/Levels', component: Levels},
    {path: `/Classrooms/:id`, component: Classrooms},
    {path: `/Classrooms/:level_id/Subjects/:classroom_id`, component: Subjects}

]
const router = new VueRouter({
    routes
})
const app = new Vue({
    el: '#app',
    router,
    components:{Myside,Levels,Classrooms,Subjects,Results,ResultTable}
});
