import CategoriesIndex from './components/categories/CategoriesIndex.vue';
import CategoriesEdit from './components/categories/CategoriesEdit.vue';
import MediasIndex from './components/medias/MediasIndex.vue';
import MediasEdit from './components/medias/MediasEdit.vue';
import MediasCreate from './components/medias/MediasCreate.vue';


const routesWithPrefix = (prefix, routes) => {
    return routes.map(route => {
      route.path = `${prefix}${route.path}`
  
      return route
    });
}
export const routes = [
    ...routesWithPrefix('/admin', [{
        path: '/categories',
        name: 'admin.categories.index',
        component: CategoriesIndex
    },
    {
        path: '/categories/:id/edit',
        name: 'admin.categories.edit',
        component:  CategoriesEdit
    },{
        path: '/medias',
        name: 'admin.medias.index',
        component: MediasIndex
    },
    {
        path: '/medias/:id/edit',
        name: 'admin.medias.edit',
        component:  MediasEdit
    },{
        path: '/medias/create',
        name: 'admin.medias.create',
        component: MediasCreate
    }])
]
