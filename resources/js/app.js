/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


import { createApp } from 'vue'; 
import BaseMixins from './mixins/base.js'
import PrimeVue from 'primevue/config';
import 'primevue/resources/themes/saga-blue/theme.css';
import 'primevue/resources/primevue.min.css';
import 'primeicons/primeicons.css';
import 'primeflex/primeflex.css';//TODO: razmotriti moguce optimizacije

import dashboard from './pages/dashboard';
import InputText from 'primevue/inputtext';
import Button from 'primevue/button';
import Textarea from 'primevue/textarea';
import Dropdown from 'primevue/dropdown';
import Checkbox from 'primevue/checkbox';
import Card from 'primevue/card';
import Sidebar from 'primevue/sidebar';
import Menu from 'primevue/menu';
import Menubar from 'primevue/menubar';
import Panel from 'primevue/panel';
import Dialog from 'primevue/dialog';
import ProgressSpinner from 'primevue/progressspinner';
  
window.app = createApp({});
app.use(PrimeVue);

app.component('dashboard', dashboard);
app.component('InputText', InputText);
app.component('Button', Button);
app.component('Textarea', Textarea);
app.component('Dropdown', Dropdown);
app.component('Checkbox', Checkbox);
app.component('Card', Card);
app.component('Sidebar', Sidebar);
app.component('Menu', Menu);
app.component('Menubar', Menubar);
app.component('Panel', Panel);
app.component('Dialog', Dialog);
app.component('ProgressSpinner', ProgressSpinner);

app.mixin(BaseMixins);

app.mount('#app'); 
 