import { createApp } from "vue";
import { router } from './router';
import App from "./App.vue";

import './assets/css/styles.css';
// import  './../../node_modules/tailwindcss/base.css'
// import  './../../node_modules/tailwindcss/components.css'
// import  './../../node_modules/tailwindcss/utilities.css'

const app = createApp(App).use(router);

app.mount("#app")
