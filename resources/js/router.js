import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./components/pages/Home";
import Posts from "./components/pages/Posts";
import AboutUs from "./components/pages/AboutUs.vue";
import SinglePost from "./components/pages/SinglePost";
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
            path: "/posts",
            name: "posts",
            component: Posts
        },
        {
            path:"/chi-siamo",
            name: "about-us",
            component: AboutUs
        },
        {
            path:"/post/:slug",
            name: "single-post",
            component: SinglePost
        },
        {
            path:"/*",
            name: "404NotFound",
            component: NotFound
        }
    ]
});

export default router