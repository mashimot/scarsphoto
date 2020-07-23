<template>
<div>
    <form @submit.prevent="onSubmit">
        <fieldset :disabled="loading">
            <div class="form-group">
                <label for="gallery">Categoria</label>
                <input type="text" id="gallery" class="form-control" v-model="gallery.gallery_name" :class="{ 'is-invalid': form.errors.has('gallery_name') }">
                <div v-if="form.errors.has('gallery_name')" v-text="form.errors.first('gallery_name')" class="invalid-feedback"></div>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </fieldset>
    </form>
    <div class="p-2 align-items-center justify-content-center h-100" v-if="loading">
        <self-building-square-spinner
            :animation-duration="2000"
            :size="30"
            color="#ff1d5e"
        >
        </self-building-square-spinner>
        Loading...
    </div>
</div>
</template>

<script>
    import Form from 'form-backend-validation';
    export default {
        data(){
            return {
                id: -1,
                gallery: {},
                form: new Form(),
                loading: false
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created() {
        },
        methods: {
            onSubmit() {
                this.loading = true;
                this.gallery._token = Laravel.csrfToken;
                this.form = new Form(this.gallery);
                this.form.post(`${Laravel._BASE_URL}/admin/galleries`)
                .then(response => {
                    this.$toasted.global.on_success({
                        message : 'Data has been saved successfully'
                    });
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
