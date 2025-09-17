import './bootstrap';

import { createApp } from 'vue';
import TestComponent from './components/TestComponent.vue';

const app = createApp({});

app.component('test-component', TestComponent);

app.mount('#app');
