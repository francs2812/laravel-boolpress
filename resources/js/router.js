import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

//pagine importate
import Home from './pages/Home';
import Contatti from './pages/Contatti';

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
         }
    ]
});

export default router;