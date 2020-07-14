<template>
<div>
    <ul class="nav nav-tabs nav-pills">
        <li  v-for="(gallery, idxgallery) in galleries" :key="idxgallery" :id="`tabs-${idxgallery}`" class="nav-item">
            <a @click.prevent="changeQuery(gallery.gallery_id)"
                href="#" 
                data-toggle="tab" 
                class="nav-link small text-uppercase"
            >{{ gallery.gallery_name }}</a>
        </li>
        <li class="nav-item">
            <a @click.prevent="changeQuery(0)"
                href="#"
                data-toggle="tab" 
                class="nav-link small text-uppercase"
            >Sem Categoria</a>
        </li>
        <li class="nav-item">
            <a @click.prevent="refreshPage()"
                href="#"
                data-toggle="tab" 
                class="nav-link small text-uppercase active"
            >Todas</a>
        </li>
        <li class="nav-item">
            <router-link :to="{ name: 'admin.medias.create' }" data-toggle="tab" class="nav-link small text-uppercase">
                Create
            </router-link>
        </li>        
    </ul>
    <!--
    <div class="btn-group" v-if="!loading">
        <div v-for="(gallery, idxgallery) in galleries" :key="idxgallery">
            <a
                @click.prevent="changeQuery(gallery.gallery_id)"
                href="#"
                class="btn btn-primary"
            >
                {{ gallery.gallery_name }}
            </a>    
        </div>
        <a
            @click.prevent="changeQuery(0)"
            href="#"
            class="btn btn-primary"
        >
            Sem Categoria
        </a>
        <a 
            @click.prevent="refreshPage()"
            href="#"
            class="btn btn-primary"
        >
            Todas
        </a> 
    </div>
    <div>
        <router-link :to="{ name: 'admin.medias.create' }" class="btn btn-primary">
            Create
        </router-link> 
    </div>
    -->
    <h1 v-if="loading">Loading...</h1>
    <div class="row">
        <div class="col-9" :disabled="loading">
            <div class="row no-gutters">
                <div v-for="(m, idxmedia) in medias.data" :key="idxmedia" class="col-md-2 mb-2">
                    <div class="card h-100" :class="{ 'border border-dark': media.media_id == m.media_id } " @click="editFile(m)" style="cursor: pointer;">
                        <div class="card-header">
                            <p>Title: {{ m.media_title }}</p>
                            <p>Owner: {{ m.owner_media_name }}</p>

                            <div class="form-group">         
                                <h6 v-for="(media_gallery, media_gallery_idx) in m.media_galleries" :key="`gallery-${idxmedia}-${media_gallery_idx}`" class="text-danger">
                                    <span class="badge badge-primary">{{ media_gallery.gallery_name }}</span>
                                </h6>
                            </div>
                            <div class="btn-group" role="group">
                                <!--
                                <router-link :to="{ name: 'admin.medias_galleries.edit', params: { id: m.media_id } }" class="btn btn-outline-primary">
                                    Edit Galleries
                                </router-link>
                                <router-link :to="{ name: 'admin.medias.edit', params: { id: m.media_id } }" v-if="m.is_owner_media" class="btn btn-outline-success">
                                    Edit
                                </router-link>
                                -->
                            </div>
                        </div>
                        <div class="card-body">
                            <img v-bind:src="`${m.media_url}`" alt="" class="card-img-top img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card"  v-if="media.media_id == null">
                <div class="card-body">
                    Seleciona uma Imagem
                </div>
            </div>
            <form @submit.prevent="onSubmit" v-if="media.media_id != null">
                <fieldset :disabled="loading">
                    <div class="form-group" v-if="media.is_owner_media">
                        <label for="media_title">Título</label>
                        <input id="media_title" type="text" class="form-control" v-model="media.media_title" :class="{ 'is-invalid': form.errors.has('media_title') }">
                        <div v-if="form.errors.has('media_title')" v-text="form.errors.first('media_title')" class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" v-if="media.is_owner_media">
                        <label for="media_comment">Comentários</label>
                        <input id="media_comment" type="text" class="form-control" v-model="media.media_comment" :class="{ 'is-invalid': form.errors.has('media_comment') }">
                        <div v-if="form.errors.has('media_comment')" v-text="form.errors.first('media_comment')" class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="media_galleries">Galerias</label>
                        <div v-for="(gallery, gallery_idx) in media.media_galleries" :key="`media_gallery-${gallery_idx}`">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox"
                                        v-on:change="toggle(gallery)"
                                        v-bind:checked="gallery.is_checked"
                                    > {{ gallery.gallery_name }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" v-if="media.is_owner_media">
                        <label for="media_nsfw">Conteúdo Adulto?</label>   
                        <div class="custom-control custom-radio">
                            <input type="radio" id="media_nsfw-sim" class="custom-control-input " v-model="media.media_nsfw" :name="`media_nsfw`"  :value="1" :class="{ 'is-invalid': form.errors.has('media_nsfw') }"/>
                            <label class="custom-control-label" for="media_nsfw-sim">Sim</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="media_nsfw-nao" class="custom-control-input " v-model="media.media_nsfw" :name="`media_nsfw`" :value="0" :class="{ 'is-invalid': form.errors.has('media_nsfw') }"/>
                            <label class="custom-control-label" for="media_nsfw-nao">Não</label>
                            <div v-if="form.errors.has('media_nsfw')" v-text="form.errors.first('media_nsfw')" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="button" @click="deleteMedia(media.media_id)" v-if="media.is_owner_media" class="btn btn-sm btn-block btn-outline-danger">Delete</button>                        
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-block btn-primary">Save Changes</button>
                    </div>
                </fieldset>
            </form>
        </div>                 
    </div>
    <pagination :data="medias" @pagination-change-page="getAll"></pagination>
 </div>
</template>

<script>
    import Form from 'form-backend-validation';

    export default {
        data() {
            return {
                medias: {
                    data: []
                },
                form: new Form(),
                media: {
                    media_id: null
                },
                loading: true,
                galleries: [],
                current_gallery_id: -1
            }
        },
        created() {
            //this.getMedias();
            //this.getGalleries();
        },
        mounted(){
            this.getAll();
        },
        methods: {
            toggle(gallery){
                gallery.is_checked = !gallery.is_checked
            },
            editFile(media){
                media = Object.assign({}, media);
                this.media = media;
                let media_galleries = [];
                this.galleries.forEach(gallery => {
                    let is_checked = false;
                    this.media.media_galleries.forEach((mG, i) => {
                        if(mG.gallery_id == gallery.gallery_id){
                            is_checked = true;
                        }
                    })
                    media_galleries.push({...gallery, is_checked: is_checked});
                });
                this.media.media_galleries = {...media_galleries};
            },
            onSubmit() {
                this.form = new Form(this.media);
                this.form.put(`${Laravel._BASE_URL}/admin/medias/${this.media.media_id}/galleries`)
                /*this.axios.put(`${Laravel._BASE_URL}/admin/medias/${this.media.media_id}/galleries`, {
                    data: this.media.media_galleries
                })*/
                    .then(response => {
                        console.log(response);
                        let page = 1;
                        if(typeof this.$route.query.page != 'undefined'){
                            page = this.$route.query.page;
                        }
                        this.getAll(page);
                    })
                    .then(response => {
                        this.$toasted.global.on_success();
                    })
                    .catch(error => {
                        this.$toasted.global.on_error();
                    })
                    .finally(() => {
                        this.loading = false;
                    });
            },
            refreshPage(){
                this.$router.replace({'query': null});
                this.getAll();
            },
            changeQuery(gallery_id){
                let query = Object.assign({}, this.$route.query);
                query.gallery_id = gallery_id;
                this.$router.push({ query }).catch(e => {});
                this.getAll();
            },
            getAll(page = 1){
                this.loading = true;
                this.axios.all([
                    this.getGalleries(),
                    this.getMedias(page)
                ])
                .then(
                    this.axios.spread((galleries, medias) => {
                        console.log(medias);
                        this.medias = medias;
                        this.galleries = galleries;                
                    })
                )
                .finally(() => {
                    this.loading = false;
                });
            },
            getMedias(page){
                let query = Object.assign({}, this.$route.query);
                let url = `${Laravel._BASE_URL}/admin/medias/galleries`;
                
                if(typeof page == 'undefined'){
                    if(typeof this.$route.query.page != 'undefined'){
                        query.page = this.$route.query.page;
                    }
                } else {
                    query.page = page;
                }

                if(typeof this.$route.query.gallery_id != 'undefined'){
                    url = `${Laravel._BASE_URL}/admin/medias/galleries/${this.$route.query.gallery_id}`;
                }
            
                //this.$router.push({ query: Object.assign({}, this.$route.query, queryParams) });
                //this.$router.push({ path : '/admin/medias', query : queryParams });
                //this.loading = true;
                return this.axios
                    .get(url, {
                        params: query
                    })
                    .then(response => {
                        this.$router.push({ query }).catch(e => {});
                        return response.data;
                    });
            },
            getGalleries(){
                return this.axios
                    .get(`${Laravel._BASE_URL}/admin/galleries/create`)
                    .then(response => {
                        return response.data;
                    });
            },
            deleteMedia(id) {
                this.loading = true;
                this.axios
                .delete(`${Laravel._BASE_URL}/admin/medias/${id}`)
                .then(response => {
                    console.log(response);
                    let i = this.medias.data.map(item => item.media_id).indexOf(id); // find index of your object
                    this.medias.data.splice(i, 1);
                    this.media = {
                        media_id: null
                    }
                })
                .then(response => {
                    this.$toasted.global.on_success();
                })
                .catch(error => {
                    this.$toasted.global.on_error();
                })
                .finally(() => {
                    this.loading = false;
                });
            }
        }
    }
</script>