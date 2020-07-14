<template>
<div>
    <galleries-list></galleries-list>
    <div class="galleries_layout">
        <div class="profile_body">
            <div class="galleries_body infinite_scroll_container pagination_finished single_page galleries_body--fetched">
                <div class="gallery_list">
                    <div v-for="userGallery in userGalleries" :key="userGallery.gallery_id" class="gallery_card_view px_card medium no_badge no_avatar" ><div class="gallery_card__overlay"></div>
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
</div>
</template>

<script>
    import GalleriesList from './../partials/galleries/GalleriesList';
    export default {
        data() {
            return {
                userGalleries: [],
                loading: true
            }
        },
        components: {
            'galleries-list': GalleriesList
        },
        methods: {
            getUserGalleries(pos = null, __this = null){
                let vm = this;
                vm.loading = true;
                vm.axios
                    .get(`${Laravel._BASE_URL}/api/portfolio/galleries`)
                    .then((response) => {
                        vm.userGalleries = response.data;
                    });
            }
        },
        beforeCreate() {
            this.$nextTick().then(() => document.body.classList.remove(...[
                "page-template-template-fullpage",
                "page-template-template-fullpage-php"
            ]))
        },
        created(){
            this.getUserGalleries();
        }
    }
    //@import "https://assetcdn.500px.org/assets/galleries-ec25d7bbd248e574f22da22d99029975.css";
</script>
<style scoped>
</style>
