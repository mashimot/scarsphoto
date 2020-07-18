<template>
<div>
    <!--
    <div class="title-container-outer-wrap"> 
        <div class="title-container-wrap-remover-aqui">
            <div class="title-container clearfix">
                <div class="entry-title">
                    <h1 class="entry-title">
                        Galerias
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid clearfix">
        <div class="page-contents-wrap">
            <div id="post-5836" class="post-5836 page type-page status-publish hentry">
                <div class="entry-page-wrapper entry-content clearfix">
                    <div id="mtheme-pagebuilder-wrapper-5836" class="mtheme-pagebuilder">
                        <div class="mtheme-supercell clearfix ">
                            <div class="mtheme-cell-wrap">
                                <div id="mtheme-block-1" class="mtheme-block mtheme-block-em_portfolio_grid span12 mtheme-first-cell " data-width="12">
                                    <div class="gridblock-filter-select-wrap">
                                        <ul id="gridblock-filters">
                                            <li class="filter-control filter-control-artwork">
                                                <router-link :to="{ name: 'portfolio.index' }" class="btn btn-link">Fotos ({{ medias.length }})</router-link>
                                            </li>
                                            <li class="filter-control filter-control-artwork">
                                                <router-link :to="{ name: 'galleries.index' }">Galerias ({{ userGalleries.length }})</router-link>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contentclearfix clearfix"></div>
        </div>
    </div>
    -->
    <!--
    <div class="title-container-outer-wrap"> 
        <div class="title-container-wrap-remover-aqui">
            <div class="title-container clearfix">
                <div class="entry-title">
                    <h1 class="entry-title">
                        Galerias
                    </h1>
                </div>
            </div>
        </div>
    </div>    
      <div class="galleries_layout">
        <div class="profile_body">
            <div class="galleries_body infinite_scroll_container pagination_finished single_page galleries_body--fetched">
                <div class="gallery_list">
                    <div v-for="userGallery in userGalleries" :key="userGallery.gallery_id" class="gallery_card_view px_card medium no_badge no_avatar" >
                        <router-link class="link_wrap" :to="{ name: 'galleries.show', params: { id: userGallery.gallery_id } }"></router-link>
                        <div class="bottom gallery_card_view__bottom">
                            <div class="gallery_card_view__name_wrapper ">
                                <router-link class="name" :to="{ name: 'galleries.show', params: { id: userGallery.gallery_id } }">{{ userGallery.gallery_name }}</router-link>
                            </div>
                            <span class="description gallery_card_view__photo_count gallery_card_view__description">{{ userGallery.total }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->
    <div class="title-container-outer-wrap"> 
        <div class="title-container-wrap-remover-aqui">
            <div class="title-container clearfix">
                <div class="entry-title">
                    <h1 class="entry-title">
                        Galerias
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid clearfix">
        <div class="page-contents-wrap">
            <div id="post-5836" class="post-5836 page type-page status-publish hentry">
                <div class="entry-page-wrapper entry-content clearfix">
                    <div id="mtheme-pagebuilder-wrapper-5836" class="mtheme-pagebuilder">
                        <div class="mtheme-supercell clearfix ">
                            <div class="mtheme-cell-wrap">
                                <div id="mtheme-block-1" class="mtheme-block mtheme-block-em_portfolio_grid span12 mtheme-first-cell " data-width="12">
                                    <div class="gridblock-filter-select-wrap">
                                        <ul id="gridblock-filters">
                                            <li v-for="userGallery in userGalleries" :key="userGallery.gallery_id" class="filter-control filter-control-artwork">
                                                <router-link 
                                                    :to="{ name: 'galleries.show', params: { id: userGallery.gallery_id } }" 
                                                    :style="[ gallery_id != null && userGallery.gallery_id == gallery_id ? { 'color': 'red' } : {} ]"
                                                    class="btn btn-link"
                                                >{{ userGallery.gallery_name }}</router-link>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contentclearfix clearfix"></div>
        </div>
    </div>    
</div>
</template>

<script>
    export default {
        data() {
            return {
                gallery_id: null,
                userGalleries: [],
                medias: []
            }
        },
        watch: {
            '$route' (to, from) {
                this.gallery_id = this.$route.params.id;
            }
        },
        methods: {
            getUserGalleries(){
                let vm = this;
                vm.loading = true;
                vm.axios
                    .get(`${Laravel._BASE_URL}/api/portfolio/galleries`)
                    .then((response) => {
                        vm.userGalleries = response.data;
                    });
            }
        },
        created(){
            this.gallery_id = this.$route.params.id;
            this.getUserGalleries();

/*            this.axios
                .get(`${Laravel._BASE_URL}/api/portfolio/galleries/create`)
                .then(response => {
                    
                    this.userGalleries = response.data.userGalleries;
                    this.medias = response.data.medias;
                    console.log(response.data);
                    console.log(this.userGalleries, this.medias);
                    this.loading = false;
                });*/
        },
    }
</script>