import { createRouter, createWebHistory } from "vue-router";

import Index from "./../views/pages/index.vue";
// import LoginPage from "../views/pages/Login/Login.vue";
// import Spares from "../views/pages/spares/index.vue";

const routes = [
    {
        path: "/",
        name: "index",
        component: Index,
    },
    // {
    //     path: "/spares",
    //     name: "spares",
    //     component: Events,
    // },
    // {
    //     path: '/login',
    //     name: 'Login',
    //     component: LoginPage
    // },
    // {
    //     path: "/spares/:id",
    //     name: "spare",
    //     component: Service,
    // },
    // {
    //     path: "/new-spare-part",
    //     name: "new-spare-part",
    //     component: CreateOrEditSpare,
    // },
    // {
    //     path: "/contact",
    //     name: "contact",
    //     component: Contact,
    // },
    // {
    //     path: "/error-404",
    //     name: "error-404",
    //     component: Error404,
    // },
    // {
    //     path: "/dashboard",
    //     name: "Dashboard",
    //     component: Dashboard,
    // },
];

export const router = createRouter({
    history: createWebHistory("/"),
    linkActiveClass: "active",
    routes,
});
