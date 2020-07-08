import AdminGalleriesIndex from './components/admin/galleries/GalleriesIndex.vue';
import AdminGalleriesEdit from './components/admin/galleries/GalleriesEdit.vue';
import AdminGalleriesCreate from './components/admin/galleries/GalleriesCreate.vue';
import AdminContactsIndex from './components/admin/contacts/ContactsIndex.vue';
import AdminContactsEdit from './components/admin/contacts/ContactsEdit.vue';
import AdminMediasIndex from './components/admin/medias/MediasIndex.vue';
import AdminMediasCreate from './components/admin/medias/MediasCreate.vue';
import ContactsIndex from './components/contacts/ContactsIndex.vue';
import GalleriesShow from './components/galleries/GalleriesShow.vue';
import GalleriesIndex from './components/galleries/GalleriesIndex.vue';
import PortfolioIndex from './components/portfolio/PortfolioIndex.vue';
import HomeIndex from './components/home/HomeIndex.vue';
import AboutIndex from './components/about/AboutIndex.vue';


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
    {
        path: '/portfolio',
        name: 'portfolio.index',
        component: PortfolioIndex,
        meta: { title: 'Portfolio' }
    },
    {
        path: '/',
        name: 'home.index',
        component: HomeIndex,
        meta: { title: 'HOme' }
    },
    {
        path: '/about',
        name: 'about.index',
        component: AboutIndex,
        meta: { title: 'About' }
    }
]
