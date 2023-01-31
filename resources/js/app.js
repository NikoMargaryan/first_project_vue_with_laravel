import './bootstrap';
import { createApp } from 'vue';
import UserComponent from './components/UserComponent.vue';
import router from "./router";


const app = createApp(UserComponent);


app.use(router)
app.mount('#app');
