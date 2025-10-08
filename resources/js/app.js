import './bootstrap';

import { createApp } from 'vue';
import TestComponent from './components/TestComponent.vue';
import LoginForm from './components/LoginForm.vue';
import RegisterForm from './components/RegisterForm.vue';

const app = createApp({});

app.component('test-component', TestComponent);
app.component('login-form', LoginForm);
app.component('register-form', RegisterForm);

app.mount('#app');
