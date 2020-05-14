import Vue from 'vue';
import Router from 'vue-router';
import Home from './components/HomeComponent';
import Index from './views/index'
import Members from './views/filter/Member';
import Organization from './views/filter/organization';
import Ticket from './views/filter/ticket';

Vue.use(Router);

const router = new Router({
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
            redirect: {name: 'search'},
            children: [
                {
                    path: '/search',
                    name: 'search',
                    component: Index,
                    children: [
                        {
                            path: '/user',
                            name: 'user',
                            component: Members
                        },
                        {
                            path: '/organization',
                            name: 'organization',
                            component: Organization
                        },
                        {
                            path: '/ticket',
                            name: 'ticket',
                            component: Ticket
                        }
                    ]
                },

            ]
        }
    ]
});

export default router;