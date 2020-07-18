import AdminGalleriesIndex from './pages/admin/galleries/GalleriesIndex.vue';
import AdminGalleriesEdit from './pages/admin/galleries/GalleriesEdit.vue';
import AdminGalleriesCreate from './pages/admin/galleries/GalleriesCreate.vue';
import AdminContactsIndex from './pages/admin/contacts/ContactsIndex.vue';
import AdminContactsEdit from './pages/admin/contacts/ContactsEdit.vue';
import AdminMediasIndex from './pages/admin/medias/MediasIndex.vue';
import AdminMediasCreate from './pages/admin/medias/MediasCreate.vue';
import ContactsIndex from './pages/contacts/ContactsIndex.vue';
import GalleriesShow from './pages/galleries/GalleriesShow.vue';
import GalleriesIndex from './pages/galleries/GalleriesIndex.vue';
//import PortfolioIndex from './pages/portfolio/PortfolioIndex.vue';
import HomeIndex from './pages/home/HomeIndex.vue';
import AboutIndex from './pages/about/AboutIndex.vue';


const routesWithPrefix = (prefix, routes) => {
    return routes.map(route => {
        route.path = `${prefix}${route.path}`;

        return route;
    });
}
/*export const routes = [{
    path: '/about',
    name: 'about.index',
    component: AboutIndex
}];*/
export const routes = [
    ...routesWithPrefix('/admin', [{
        path: '/galleries',
        name: 'admin.galleries.index',
        component: AdminGalleriesIndex
    },{
        path: '/galleries/add',
        name: 'admin.galleries.create',
        component: AdminGalleriesCreate
    },
    {
        path: '/galleries/:id/edit',
        name: 'admin.galleries.edit',
        component: AdminGalleriesEdit
    },{
        path: '/contacts',
        name: 'admin.contacts.index',
        component: AdminContactsIndex
    },
    {
        path: '/contacts/:id/edit',
        name: 'admin.contacts.edit',
        component: AdminContactsEdit
    },{
        path: '/medias',
        name: 'admin.medias.index',
        component: AdminMediasIndex
    },
    {
        path: '/medias/add',
        name: 'admin.medias.create',
        component: AdminMediasCreate
    }]),
    {
        path: '/contact',
        name: 'contacts.index',
        component: ContactsIndex,
        meta: { title: 'Contato' }
    },
    {
        path: '/portfolio/galleries/:id',
        name: 'galleries.show',
        component: GalleriesShow,
        meta: { title: 'Galerias' }
    },
    {
        path: '/portfolio/galleries',
        name: 'galleries.index',
        component: GalleriesIndex,
        meta: { title: 'Galerias' }
    },
    /*{
        path: '/portfolio',
        name: 'portfolio.index',
        component: PortfolioIndex,
        meta: { title: 'Portfolio' }
    },*/
    {
        path: '/',
        name: 'home.index',
        component: HomeIndex,
        meta: { title: 'Home' }
    },
    {
        path: '/about',
        name: 'about.index',
        component: AboutIndex,
        meta: { title: 'About' }
    }
]
