<template>
<div>
    <h1 v-if="loading">Loading..</h1>
 
    <div class="row" v-if="!loading">
        <div class="col-md-4 mb-2">
            <div class="card h-100 justify-content-center align-items-center">
                <div class="card-body">
                    <router-link :to="{ name: 'admin.galleries.create' }" class="btn btn-primary">
                        Create
                    </router-link>
                </div>
            </div>
        </div>
        <div v-for="gallery in galleries" :key="gallery.gallery_id" class="col-md-4 mb-2">
            <div class="card h-100">
                <div class="card-body">
                    <h5>{{ gallery.gallery_id }}</h5>
                    <h5>{{ gallery.gallery_name }}</h5>
                    <div class="btn-group" role="group">
                        <router-link :to="{ name: 'admin.galleries.edit', params: { id: gallery.gallery_id } }" class="btn btn-primary">
                            Edit
                        </router-link>                               
                        <button class="btn btn-danger" @click="deleteGallery(gallery.gallery_id)">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        data() {
            return {
                galleries: [],
                loading: true
            }
        },
        created() {
            this.axios
            .get(`${Laravel._BASE_URL}/admin/galleries/create`)
            .then(response => {
                console.log(response);
                this.galleries = response.data;
                this.loading = false;
            });
        },
        methods: {
            deleteGallery(id) {
                this.axios
                .delete(`${Laravel._BASE_URL}/admin/galleries/${id}`)
                .then(response => {
                    console.log(response.data);
                    let i = this.galleries.map(item => item.gallery_id).indexOf(id); // find index of your object
                    this.galleries.splice(i, 1)
                })
            }
        }
    }
</script>
