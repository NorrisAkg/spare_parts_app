import { createApp } from "vue";
import { router } from './router';
import App from "./App.vue";

import './assets/css/styles.css';

const app = createApp(App).use(router);

app.mount("#app")
