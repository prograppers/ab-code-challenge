import { createRouter, createWebHistory } from 'vue-router'

import DepartmentsIndex from '../components/departments/DepartmentsIndex.vue'
import DepartmentsCreate from '../components/departments/DepartmentsCreate.vue'
import DepartmentsEdit from '../components/departments/DepartmentsEdit.vue'
//import DepartmentsStart from '../components/departments/DepartmentsStart.vue'

const routes = [
    {
        path: '/dashboard',
        name: 'departments.index',
        component: DepartmentsIndex
    },
    {
        path: '/departments/create',
        name: 'departments.create',
        component: DepartmentsCreate
    },
    {
        path: '/departments/:id/edit',
        name: 'departments.edit',
        component: DepartmentsEdit,
        props: true
    },

];

export default createRouter({
    history: createWebHistory(),
    routes
})
