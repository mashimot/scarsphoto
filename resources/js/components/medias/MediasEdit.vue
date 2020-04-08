<template>
<div>
    <h1 v-if="loading">Loading...</h1>

    <form @submit.prevent="onSubmit">
        <span class="help is-danger" v-text="errors"></span>
        <div class="form-group">
            <input type="text" class="form-control" v-model="media.media_title">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" v-model="media.media_comment">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" v-model="media.media_url">
        </div>
        <div class="form-group">
            <select class="form-control" v-model="media.media_has_parental_control">
                <option value="0">Sim</option>
                <option value="1">Não</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>    
</template>

<script>
    export default {
        data(){
            return {
                id: -1,
                errors: '',
                media: {
                    media_id: '',
                    media_title: '', 
                    media_comment: '',
                    media_url: '',
                    media_has_parental_control: '',
                    media_type_id: ''
                },
                loading: true
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created() {
            this.id = this.$route.params.id;
            this.axios.get(`${LARAVEL._BASE_URL}/admin/medias/${this.id}`)
            .then(response => {
                console.log(response.data);
                this.loading = false;
                this.media = response.data;
            });
        },
        methods: {
            onSubmit() {
                this.media._token = LARAVEL._TOKEN;
                this.axios.put(`${LARAVEL._BASE_URL}/admin/medias/${this.id}`, this.media)
                .then(response => {
                    this.media = response.data;
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                }); 
            }
        }
    }
</script>
