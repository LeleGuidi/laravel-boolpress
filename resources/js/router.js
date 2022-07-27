import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./components/pages/Home";
import AboutUs from "./components/pages/AboutUs.vue";
import NotFound from "./components/pages/404NotFound.vue";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path:"/chi-siamo",
            name: "about-us",
            component: AboutUs
        },
        {
            path:"/*",
            name: "404NotFound",
            component: NotFound
        }
    ]
});

export default router