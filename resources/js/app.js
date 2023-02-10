import './bootstrap';
import { createApp } from 'vue';
import UserComponent from './components/UserComponent.vue';
import router from "./router";

import VueCroppa from 'vue-croppa';




const app = createApp(UserComponent);

app.use(VueCroppa);
app.use(router)
app.mount('#app');
