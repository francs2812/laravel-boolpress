import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

//pagine importate
import Home from './pages/Home';
import Contatti from './pages/Contatti';
import About from './pages/About';
import Post from './pages/Post';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home 
         },

         {
            path: '/contatti',
            name: 'contatti',
            component: Contatti 
         },

         {
            path: '/about',
            name: 'about',
            component: About 
         },

         {
            path: '/post/:slug',
            name: 'post',
            component: Post 
         }
    ]
});

export default router;