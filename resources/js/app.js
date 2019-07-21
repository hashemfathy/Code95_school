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
import Studentside from './components/Studentside'
import Studentlevels from './components/Studentlevels'
import Studentresults from './components/Studentresults'
import StudentLevelresults from './components/StudentLevelresults'









const routes = [
    {path: '/Levels', component: Levels},
    {path: `/Classrooms/:id`, component: Classrooms},
    {path: `/Classrooms/:level_id/Subjects/:classroom_id`, component: Subjects},  
    {path: '/studentresults', component: Studentresults},
    {path: '/studentlevels', component: Studentlevels},
    {path: '/studentl-level-result/:level_id', component: StudentLevelresults},

    

]
const router = new VueRouter({
    routes
})
var one = new Vue({
    el: '#app',
    router,
    components:{Myside,Levels,Classrooms,Subjects,Results,ResultTable}
});
var two = new Vue({
    el: '#studentApp',
    router,
    components:{Studentside,Studentlevels,Studentresults,StudentLevelresults}
});
