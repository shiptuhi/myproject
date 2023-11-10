/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');
// import vue from 'vue'
// window.Vue = vue;
import 'bootstrap';
import App from './components/App.vue';
import ProjectList from './components/project/List.vue';
import ProjectAdd from './components/project/Add.vue';
import ProjectEdit from './components/project/Edit.vue';

import ModuleList from './components/module/List.vue';
import ModuleAdd from './components/module/Add.vue';
import ModuleEdit from './components/module/Edit.vue';

import WorkItemList from './components/work-item/List.vue';
import WorkItemAdd from './components/work-item/Add.vue';
import WorkItemEdit from './components/work-item/Edit.vue';

import WorkDoList from './components/work-do/List.vue';
import WorkDoAdd from './components/work-do/Add.vue';
import WorkDoEdit from './components/work-do/Edit.vue';

import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";


const router = createRouter({
    history: createWebHistory(),
    routes: [
        { 
            path: '/project/list',
            name: 'project-list',
            component: ProjectList, 
        },
        { 
            path: '/project/add',
            name: 'project-add',
            component: ProjectAdd, 
        },
        { 
            path: '/project/edit/:id',
            name: 'project-edit',
            component: ProjectEdit, 
        },
        { 
            path: '/module/list',
            name: 'module-list',
            component: ModuleList, 
        },
        { 
            path: '/module/add',
            name: 'module-add',
            component: ModuleAdd, 
        },
        { 
            path: '/module/edit',
            name: 'module-edit',
            component: ModuleEdit, 
        },
        { 
            path: '/work-item/list',
            name: 'work-item-list',
            component: WorkItemList, 
        },
        { 
            path: '/work-item/add',
            name: 'work-item-add',
            component: WorkItemAdd, 
        },
        { 
            path: '/work-item/edit',
            name: 'work-item-edit',
            component: WorkItemEdit, 
        },
        { 
            path: '/work-do/list',
            name: 'work-do-list',
            component: WorkDoList, 
        },
        { 
            path: '/work-do/add',
            name: 'work-do-add',
            component: WorkDoAdd, 
        },
        { 
            path: '/work-do/edit',
            name: 'work-do-edit',
            component: WorkDoEdit, 
        },
    ]
});


const app = createApp(App);
app.use(router);
app.mount('#app');
