import './bootstrap';
import { createApp } from 'vue';
import router from '@/router/router';
import store from '@/store/store'

import App from './components/App.vue';
createApp(App).use(router).use(store).mount('#app');