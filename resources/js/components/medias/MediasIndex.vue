<template>
<!--
    <table class="table table-stripped">
        <thead>
        <tr>
            <th>#</th>
            <th>Título</th>
            <th>Url</th>
            <th>Categoria</th>
        </tr>
        </thead>
        <tbody>
            <tr v-for="(media, idxmedia) in medias" :key="idxmedia">
                <td>{{ media.media_id }}</td>
                <td>{{ media.media_title }}</td>
                <td>
                    <img v-bind:src="`${media.media_url}`" alt="">
                </td>
                <td>
                    <select v-model="media.category_id" @change="updateCategory(idxmedia, media)" class="form-control">
                        <option :value="null">Select a group</option>
                        <option v-for="(category, idxcategory) in categories" :value="category.category_id" :key="idxcategory">{{ category.category_name }} </option>
                    </select>
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{ name: 'admin.medias.edit', params: { id: media.media_id } }" class="btn btn-primary">
                            Edit
                        </router-link>                               
                        <button class="btn btn-danger" @click="deleteMedia(media.media_id)">Delete</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
-->
<div>
    <div class="btn-group">
        <div v-for="(category, idxcategory) in categories" :key="idxcategory" >
            <a
                @click.prevent="changeQuery(category.category_id)"
                href="#"
                class="btn btn-primary"
            >
                {{ category.category_name }}
            </a>    
        </div>
        <a
            @click.prevent="changeQuery(0)"
            href="#"
            class="btn btn-primary"
        >
            Sem Categoria
        </a> 
       <router-link :to="{ name: 'admin.medias.create' }" class="btn btn-primary">
            Create
        </router-link>          
    </div>
    <div class="row">
        <div v-for="(media, idxmedia) in medias.data" :key="idxmedia" class="col-md-4 p-2">
            <div class="card">
                <div class="card-header">
                    <h1>#{{ media.media_id }}</h1>
                    <h1>Title: {{ media.media_title }}</h1>
                    <div class="form-group">
                        <label v-bind:for="`category-${media.media_id}`">Categoria</label>
                        <select v-model="media.category_id" @change="updateCategory(idxmedia, media)" v-bind:id="`category-${media.media_id}`" class="form-control">
                            <option :value="null">Select a category</option>
                            <option v-for="(category, idxcategory) in categories" :value="category.category_id" :key="idxcategory">{{ category.category_name }} </option>
                        </select>
                    </div>
                    <div class="btn-group" role="group">
                        <router-link :to="{ name: 'admin.medias.edit', params: { id: media.media_id } }" class="btn btn-primary">
                            Edit
                        </router-link>                               
                        <button class="btn btn-danger" @click="deleteMedia(media.media_id)">Delete</button>
                    </div>
                </div>
                <div class="card-body">
                    <img v-bind:src="`${media.media_thumb_url}`" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <pagination :data="medias" @pagination-change-page="getMedias"></pagination>
 </div>
</template>

<script>
    export default {
        data() {
            return {
                old_medias: {
                    data: []
                },
                medias: {
                    data: []
                },
                categories: [],
                current_category_id: -1
            }
        },
        watch: {
            // call again the method if the route changes
            '$route' (to, from) {
                //this.getMedias();
            },
        },
        created() {
            this.getMedias();
            this.getCategories();
        },
        methods: {
            changeQuery(category_id){
                let query = Object.assign({}, this.$route.query);
                query.category_id = category_id;
                this.$router.push({ query }).catch(e => {});
                this.getMedias();
            },
            getMedias(page){
                let query = Object.assign({}, this.$route.query);
                
                if(typeof page == 'undefined'){
                    if(typeof this.$route.query.page != 'undefined'){
                        query.page = this.$route.query.page;
                    }
                } else {
                    query.page = page;
                }
                let optionalParameters = [];
                for(let key in this.$route.query){
                    if(key == 'category_id'){
                        query[key] = this.$route.query[key];
                    }
                }
                //this.$router.push({ query: Object.assign({}, this.$route.query, queryParams) });
                //this.$router.push({ path : '/admin/medias', query : queryParams });
                this.axios
                    .get(`${LARAVEL._BASE_URL}/admin/medias/create`, {
                        params: query
                    })
                    .then(response => {
                        if(response.data.from == null){
                            //data not found
                            this.getMedias(1);
                        }
                        this.$router.push({ query }).catch(e => {});
                        this.medias = response.data;
                        this.old_medias = JSON.parse(JSON.stringify(response.data));
                    });
            },
            getCategories(){
                this.axios
                    .get(`${LARAVEL._BASE_URL}/admin/categories/create`)
                    .then(response => {
                        this.categories = response.data;
                    });
            },
            deleteMedia(id) {
                this.axios
                .delete(`${LARAVEL._BASE_URL}/admin/medias/${id}`)
                .then(response => {
                    console.log(response.data);
                    let i = this.medias.data.map(item => item.media_id).indexOf(id); // find index of your object
                    this.medias.data.splice(i, 1)
                })
            },
            updateCategory(idxmedia, current_media){
                let mediaCategory = {
                    '_token': LARAVEL._TOKEN,
                    'old_category_id': this.old_medias.data[idxmedia].category_id,
                    'new_category_id': current_media.category_id,
                    'media_id': current_media.media_id,
                }
                this.axios
                .put(`${LARAVEL._BASE_URL}/admin/medias_categories/${current_media.media_id}`, mediaCategory)
                .then(response => {
                    console.log(response.data);
                });
            }
        }
    }
</script>
