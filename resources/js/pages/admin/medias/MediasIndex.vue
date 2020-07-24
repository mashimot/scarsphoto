<template>
<div>
    <section id="nav-galleries">
        <ul class="nav nav-tabs navbar-dark">
            <li  v-for="(gallery, idxgallery) in galleries" :key="idxgallery" :id="`tabs-${idxgallery}`" class="nav-item">
                <a @click.prevent="changeQuery(gallery.gallery_id)"
                    href="#"
                    data-toggle="tab"
                    class="nav-link small text-uppercase"
                    :class="{ 'active': $route.query.gallery_id == gallery.gallery_id }"
                >{{ gallery.gallery_name }}</a>
            </li>
            <li class="nav-item">
                <a @click.prevent="changeQuery(0)"
                    href="#"
                    data-toggle="tab"
                    class="nav-link small text-uppercase"
                    :class="{ 'active': $route.query.gallery_id == 0 }"
                >Sem Categoria</a>
            </li>
            <li class="nav-item">
                <a @click.prevent="refreshPage()"
                    href="#"
                    data-toggle="tab"
                    class="nav-link small text-uppercase"
                    :class="{ 'active': typeof $route.query.gallery_id == 'undefined' }"
                >Todas</a>
            </li>
            <li class="nav-item">
                <router-link
                    :to="{ name: 'admin.medias.create' }"
                    data-toggle="tab" class="nav-link small text-uppercase"
                >
                    Create
                </router-link>
            </li>
        </ul>
    </section>
    <b-modal id="modal-1" title="Definir Imagem de Fundo" hide-footer>
        <form @submit.prevent="onSubmitGalleryCover()">
            <div class="form-group">
                <label for="bg_pages">Imagem Fundo Páginas</label>
                <pre>{{ bg_pages_choices }}</pre>
                <div v-for="(bg_page_choice, bg_page_choice_idx) in bg_pages_choices" :key="`bg_page-${bg_page_choice_idx}`">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox"
                                v-on:change="toggle(bg_page_choice)"
                                v-bind:checked="bg_page_choice.is_checked"
                            > {{ bg_page_choice.page }}
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="galleries_covers">Definir Imagem de Fundo</label>
                <div v-for="(gallery_cover, gallery_cover_idx) in galleries_covers" :key="`media_gallery_cover-${gallery_cover_idx}`">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox"
                                v-on:change="toggle(gallery_cover)"
                                v-bind:checked="gallery_cover.is_checked"
                            > {{ gallery_cover.gallery_name }}
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-block btn-primary">Save Changes</button>
        </form>
    </b-modal>
    <div class="p-2 align-items-center justify-content-center h-100" v-if="loading">
        <self-building-square-spinner
            :animation-duration="2000"
            :size="30"
            color="#ff1d5e"
        >
        </self-building-square-spinner>
        Loading...
    </div>
    <main class="main-content" :style="{ 'opacity': loading? '0.3': '1'}">
        <div class="row no-gutters">
            <div class="col-9" :disabled="loading">
                <div class="row no-gutters">
                    <div v-for="(m, idxmedia) in medias.data" :key="idxmedia" class="col-md-3 mb-2">
                        <div
                            class="card h-100"
                            :class="{
                                'border border-dark': media.media_id == m.media_id,
                                'bg-light': media.media_id == m.media_id,
                            }"
                            :style="{
                                'cursor': 'pointer',
                                //'opacity': media.media_id == m.media_id? '1': '0.8'
                            }"
                            @click="editFile(m)"
                        >
                            <a href="#/" class="position-relative">
                                <img class="card-img-top" v-bind:src="`${m.media_url}`" alt="Card image cap">
                                <div class="card-img-overlay" v-if="m.banner_galleries && m.banner_galleries.length > 0">
                                    <b-icon icon="asterisk" font-scale="2.5" class="rounded-circle bg-warning text-warning"></b-icon>
                                </div>
                            </a>
                            <div
                                class="card-body"
                                :class="{
                                    //'bg-warning': (m.banner_galleries && m.banner_galleries.length > 0)
                                }"
                            >
                                <p>
                                    <kbd v-if="m.media_nsfw == 1" class="col-md-12">
                                        <span class="text-danger">18+</span>
                                    </kbd>
                                </p>
                                <p class="card-text">
                                    Title: {{ m.media_title }}<br/>
                                    Owner: {{ m.owner_media_name }}
                                </p>
                                <b-list-group>
                                    <b-list-group-item v-if="m.banner_galleries && m.banner_galleries.length > 0">
                                        <h5 class="card-title">Imagem de Fundo</h5>

                                        <span v-for="(banner_gallery, banner_gallery_idx) in m.banner_galleries" :key="`banner_gallery-${banner_gallery_idx}`" class="text-danger">
                                            <span class="badge badge-warning mr-1">{{ banner_gallery.gallery_name }}</span>
                                        </span>
                                    </b-list-group-item>
                                    <b-list-group-item v-if="m.media_galleries && m.media_galleries.length > 0">
                                        <h5 class="card-title">Galerias</h5>

                                        <span v-for="(media_gallery, media_gallery_idx) in m.media_galleries" :key="`gallery-${idxmedia}-${media_gallery_idx}`" class="text-danger">
                                            <span class="badge badge-primary mr-1">{{ media_gallery.gallery_name }}</span>
                                        </span>
                                    </b-list-group-item>
                                </b-list-group>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card sticky-top">
                    <div class="card-body">
                        <div class="alert alert-danger" v-if="media.media_id == null">
                            Seleciona uma Imagem
                        </div>
                        <div v-if="media.media_id != null">
                            <div class="mb-2">
                                <b-button @click="setImageToBackgroundCover(media.media_id)" squared block variant="primary">Definir como Imagem de Fundo</b-button>
                            </div>
                            <form @submit.prevent="onSubmitMedia">
                                <fieldset :disabled="loading">
                                    <div class="form-group" v-if="media.is_owner_media">
                                        <label for="media_title">Título</label>
                                        <input id="media_title" type="text" class="form-control" v-model="media.media_title" :class="{ 'is-invalid': formMedia.errors.has('media_title') }">
                                        <div v-if="formMedia.errors.has('media_title')" v-text="formMedia.errors.first('media_title')" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group" v-if="media.is_owner_media">
                                        <label for="media_comment">Comentários</label>
                                        <input id="media_comment" type="text" class="form-control" v-model="media.media_comment" :class="{ 'is-invalid': formMedia.errors.has('media_comment') }">
                                        <div v-if="formMedia.errors.has('media_comment')" v-text="formMedia.errors.first('media_comment')" class="invalid-feedback"></div>
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
                                            <input type="radio" id="media_nsfw-sim" class="custom-control-input " v-model="media.media_nsfw" :name="`media_nsfw`"  :value="1" :class="{ 'is-invalid': formMedia.errors.has('media_nsfw') }"/>
                                            <label class="custom-control-label" for="media_nsfw-sim">Sim</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="media_nsfw-nao" class="custom-control-input " v-model="media.media_nsfw" :name="`media_nsfw`" :value="0" :class="{ 'is-invalid': formMedia.errors.has('media_nsfw') }"/>
                                            <label class="custom-control-label" for="media_nsfw-nao">Não</label>
                                            <div v-if="formMedia.errors.has('media_nsfw')" v-text="formMedia.errors.first('media_nsfw')" class="invalid-feedback"></div>
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
                </div>
            </div>
        </div>
        <pagination :data="medias" @pagination-change-page="getAll"></pagination>
    </main>
 </div>
</template>

<script>
    import Form from 'form-backend-validation';
//    import PulseLoader from 'vue-spinner/src/PulseLoader.vue'

    export default {
        data() {
            return {
                showModal: false,
                medias: {
                    data: []
                },
                //form: new Form(),
                formMedia: new Form(),
                formGalleryCover: new Form(),
                media: {
                    media_id: null
                },
                loading: true,
                galleries: [],
                bg_pages: ['about', 'contact'],
                bg_pages_choices: [],
                galleries_covers: [],
                current_gallery_id: -1,
                media_id: null
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
            setImageToBackgroundCover(media_id){
                let vm = this;
                vm.media_id = media_id;
                vm.galleries_covers = [];
                vm.bg_pages_choices = [];
                if(!vm.loading){
                    vm.loading = true;
                    vm.axios.get(`${Laravel._BASE_URL}/admin/medias/get_background_image`)
                    .then(result => {
                        if(typeof result.data != 'undefined'){
                            result.data.forEach((data, idx) => {
                                let is_checked = false;
                                if(data.media_id == media_id){
                                    is_checked =  true;
                                }
                                vm.bg_pages_choices.push({
                                    ...data, is_checked: is_checked
                                });
                            });
                        }
                    });

                    vm.getGalleries()
                    .then(galleries => {
                        galleries.forEach((gallery, gIdx) => {
                            let is_checked = false;
                            if(vm.media_id == gallery.banner_media_id){
                                is_checked = true;
                            }
                            vm.galleries_covers.push({...gallery, is_checked: is_checked});
                        });
                        vm.$bvModal.show('modal-1');
                    })
                    .finally(() =>{
                        vm.loading = false;
                    });
                }
            },
            onSubmitGalleryCover(){
                this.formGalleryCover = new Form({
                    galleries_covers: this.galleries_covers,
                    bg_pages_choices: this.bg_pages_choices
                });
                this.formGalleryCover.put(`${Laravel._BASE_URL}/admin/galleries/${this.media_id}/update_gallery_cover`)
                .then(r => {
                    console.log(r);
                    if(r.success){
                        this.$bvModal.hide('modal-1');
                        let page = 1;
                        if(typeof this.$route.query.page != 'undefined'){
                            page = this.$route.query.page;
                        }
                        this.getAll(page);
                    }
                });
            },
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
            onSubmitMedia() {
                this.formMedia = new Form(this.media);
                this.formMedia.put(`${Laravel._BASE_URL}/admin/medias/${this.media.media_id}/galleries`)
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
                this.media = {};
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
