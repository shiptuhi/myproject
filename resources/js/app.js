import 'bootstrap';

import App from './components/App.vue';

import Dashboard from './components/dashboard/dashboard.vue';

import Login from './components/login/Login.vue';
import Register from './components/login/Register.vue';
import ChangePassword from './components/login/changePassword.vue'

import EmployeeList from './components/employee/List.vue';
import EmployeeEdit from './components/employee/Edit.vue';
import EmployeeAdd from './components/employee/Add.vue';

import CustomerList from './components/customer/List.vue';
import CustomerAdd from './components/customer/Add.vue';
import CustomerEdit from './components/customer/Edit.vue';

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
import Notifications from '@kyvg/vue3-notification'

// import { library } from "@fortawesome/fontawesome-svg-core";
// import { faPhone } from "@fortawesome/free-solid-svg-icons";

// import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
// import store from './store';


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
            path: '/change-password',
            name: 'change-password',
            component: ChangePassword, 
        },
        { 
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard, 
        },
        { 
            path: '/employee/list',
            name: 'employee-list',
            component: EmployeeList, 
        },
        { 
            path: '/employee/add',
            name: 'employee-add',
            component: EmployeeAdd, 
        },
        { 
            path: '/employee/edit/:id',
            name: 'employee-edit',
            component: EmployeeEdit, 
        },

        { 
            path: '/customer/list',
            name: 'customer-list',
            component: CustomerList,
        },
        { 
            path: '/customer/add',
            name: 'customer-add',
            component: CustomerAdd, 
        },
        { 
            path: '/customer/edit/:id',
            name: 'customer-edit',
            component: CustomerEdit, 
        },
        { 
            path: '/project/list',
            name: 'project-list',
            component: ProjectList,
            // meta: { requiresAuth: true }, 
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

// library.add(faPhone);

const app = createApp(App);
app.use(router);
app.use(Notifications);
app.mount('#app');

router.beforeEach((to, from, next) => {
    const publicPages = ['/login', '/register'];
    const authRequired = !publicPages.includes(to.path);
    const loggedIn = localStorage.getItem('user');
  
    if (authRequired && !loggedIn) {
      return next('/login');
    }
  
    next();
});
