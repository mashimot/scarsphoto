<template>
<div>
    <h1 v-if="loading">Loading...</h1>

    <form @submit.prevent="onSubmit">
        <span class="help is-danger" v-text="errors"></span>
        <div class="form-group">
            <label for="media_title">Título</label>
            <input id="media_title" type="text" class="form-control" v-model="media.media_title">
        </div>
        <div class="form-group">
            <label for="media_comment">Comentários</label>
            <input id="media_comment" type="text" class="form-control" v-model="media.media_comment">
        </div>
        <div class="file is-info has-name">
            <label class="file-label">
                <input class="file-input" type="file" ref="file" name="file" @change="processFile($event)">
                <span class="file-cta">
                    <span class="file-icon">
                        <i class="fa fa-upload"></i>
                    </span>
                    <span class="file-label">
                        Upload new file
                    </span>
                </span>
                <span class="file-name" v-if="attachment.name" v-html="attachment.name"></span>
            </label>
        </div>

        <div class="form-group">
            <label for="media_has_parental_control">Censura</label>
            <select class="form-control" v-model="media.media_has_parental_control">
                <option value="0">Sim</option>
                <option value="1">Não</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>    
</template>

<script>
    export default {
        data(){
            return {
                id: -1,
                errors: '',
                attachment: '',
                media: {
                    media_id: '',
                    media_title: '', 
                    media_comment: '',
                    media_url: '',
                    media_has_parental_control: '',
                    media_type_id: ''
                },
                loading: false
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            onSubmit() {
                this.loading = true;
                this.media._token = LARAVEL._TOKEN;
                /*this.axios.post(`${LARAVEL._BASE_URL}/admin/medias`, this.media)
                .then(response => {
                    this.media = response.data;
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                }); */

                this.formData = new FormData();                                
                this.formData.append('file', this.attachment);
                for (var key in this.media) {
                    this.formData.append(key, this.media[key]);
                }
                axios.post(`${LARAVEL._BASE_URL}/admin/medias`, this.formData, { headers: { 'Content-Type': 'multipart/form-data' } })
                    .then(response => {
                        console.log(response);
                        //this.resetForm();
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });                
            },
            processFile(event) {
                this.attachment = event.target.files[0];
            },
        }
    }
</script>
