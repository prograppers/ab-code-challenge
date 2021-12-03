/*
require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
*/
require('./bootstrap');

require('alpinejs');

import { createApp } from 'vue';
import router from './router'

import DepartmentsIndex from './components/departments/DepartmentsIndex.vue'

createApp({
    components: {
        DepartmentsIndex
    }
}).use(router).mount('#app')

/*window.Alpine = Alpine;

Alpine.start();*/
