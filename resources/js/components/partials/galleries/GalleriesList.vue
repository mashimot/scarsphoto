<template>
<div>
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
</div>
</template>

<script>
    export default {
        data() {
            return {
                userGalleries: [],
                medias: []
            }
        },
        methods: {
       
        },
        created(){
            this.axios
                .get(`${Laravel._BASE_URL}/api/portfolio/galleries/create`)
                .then(response => {
                    
                    this.userGalleries = response.data.userGalleries;
                    this.medias = response.data.medias;
                    console.log(response.data);
                    console.log(this.userGalleries, this.medias);
                    this.loading = false;
                });
        },
    }
</script>