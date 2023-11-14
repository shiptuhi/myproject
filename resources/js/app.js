/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import 'bootstrap';

import App from './components/App.vue';

import Login from './components/login/Login.vue';
import Register from './components/login/Register.vue';

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

import { library } from "@fortawesome/fontawesome-svg-core";
import { faPhone } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";


const router = createRouter({
    history: createWebHistory(),
    routes: [
        { 
            path: '/login',
            name: 'login',
            component: Login, 
        },
        { 
            path: '/register',
            name: 'register',
            component: Register, 
        },
        { 
            path: '/project/list',
            name: 'project-list',
            component: ProjectList,
            meta: { requiresAuth: true }, 
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
            path: '/module/edit/:id',
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
            path: '/work-item/edit/:id',
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
            path: '/work-do/edit/:id',
            name: 'work-do-edit',
            component: WorkDoEdit, 
        },
    ]
});

library.add(faPhone);

const app = createApp(App);
app.use(router).component("font-awesome-icon", FontAwesomeIcon).mount('#app');
