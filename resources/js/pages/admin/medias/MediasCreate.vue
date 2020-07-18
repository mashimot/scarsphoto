<template>
<div>
    <h1 v-if="loading">Loading...</h1>
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label class="w-100">
                    Escolha um arquivo
                    <div class="custom-file">
                        <!--
                        <button id="custom-file-input" class="custom-file-input" @change="processFile($event)" :class="{ 'is-invalid': form.errors.has('file') }">Add File</button>
                        -->
                        <input
                            type="file"
                            multiple
                            accept="image/jpeg"
                            class="custom-file-input" 
                            @change="processFile($event)"
                        />
                        <label class="custom-file-label" for="custom-file-input" v-text="attachment.name">Choose file...</label>
                        <div v-if="form.errors.has('file')" v-text="form.errors.first('file')" class="invalid-feedback"></div>
                    </div>            
                </label>
            </div>
            <div class="row no-gutters">
                <div v-for="(m, media_idx) in medias" :key="`medias-${media_idx}`" class="col-md-2 mb-2">
                    <div class="card h-100" :class="{ 'border border-dark': m.media_id == media.media_id, 'border border-danger': objectLen(m.errors) > 0 }">
                        <div class="card-header">
                            <button class="btn btn-primary" @click="editFile(m, media_idx)">edit</button>
                            <button class="btn btn-danger" @click="deleteFile(media_idx)">delete</button>
                        </div>
                        <div class="card-body">
                            <div v-if="objectLen(m.errors) > 0" class="border border-warning p-2">
                                <svg class="bi bi-exclamation-triangle-fill text-danger" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 5zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                </svg>
                                <b>Corrigir o erro</b>
                            </div>
                            <p>Titulo: {{ m.media_title }}</p>  
                            <img class="preview card-img-top img-fluid" :ref="'media_files'" />

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="alert alert-danger" v-if="media.errors && objectLen(media.errors) > 0">
                <div v-for="error in media.errors">
                    {{ error }}
                </div>
            </div>
            <form @submit.prevent="onSubmit">
                <div class="form-group">
                    <label for="media_title">Título</label>
                    <input id="media_title" type="text" class="form-control" v-model="media.media_title" :class="{ 'is-invalid': form.errors.has('media_title') }">
                    <div v-if="form.errors.has('media_title')" v-text="form.errors.first('media_title')" class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="media_comment">Comentários</label>
                    <input id="media_comment" type="text" class="form-control" v-model="media.media_comment" :class="{ 'is-invalid': form.errors.has('media_comment') }">
                    <div v-if="form.errors.has('media_comment')" v-text="form.errors.first('media_comment')" class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="media_galleries">Galerias</label>
                    <div v-for="(gallery, gallery_idx) in galleries" :key="`gallery-${gallery_idx}`">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox"
                                    :value="gallery"
                                    v-model="media.media_galleries"
                                > {{ gallery.gallery_name }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
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
                    <button type="submit" class="btn btn-block btn-primary" :disabled="loading">Create ({{ this.medias.length }} Photos)</button>
                </div>
            </form>
        </div>
    </div>
</div>    
</template>

<script>
    import Form from 'form-backend-validation';

    export default {
        data(){
            return {
                attachment: '',
                form: new Form(),
                galleries: [],
                medias: [],
                media: {
                    media_id: null,
                    media_title: '', 
                    media_comment: '',
                    media_url: '',
                    media_nsfw: 0,
                    media_type_id: '',
                    media_galleries: [],
                    media_file: {},
                    media_has_file: false,
                    errors: {}
                },
                images: [],
                loading: false
            }
        },
        created() {            
            this.getGalleries();
        },
        methods: {
            objectLen: function (obj) {
                return Object.keys(obj).length;
            },
            deleteShit(){
                if(this.medias.length > 0){
                    this.medias.forEach((media, index) =>{
                        if(!media.media_has_file){
                            this.medias.splice(index, 1);
                        }
                    });
                }
            },
            getGalleries(){
                this.axios.get(`${Laravel._BASE_URL}/admin/galleries/create`)
                    .then(response => {
                        this.galleries = response.data;
                    });      
            },
            onSubmit() {
                this.loading = true;
                this.deleteShit();
                this.form = new Form({
                    medias: this.medias
                });
                console.log(this.medias);
                this.form.post(`${Laravel._BASE_URL}/admin/medias`, { headers: { 'Content-Type': 'multipart/form-data' } })
                    .then(response => {
                        //console.log(response);
                        this.$toasted.global.on_success({
                            message : 'Data has been saved successfully'
                        });
                    })
                    .catch((error) => {
                        console.log(error.response.data.errors);
                        this.$toasted.global.on_error();
                        let _errors = error.response.data.errors;
                        this.medias.forEach((media, media_index) => {
                            let errors = {};
                            for(let key in _errors){
                                let splitError = key.split(".");
                                if(splitError[1] == media_index){
                                    errors[key] = _errors[key];
                                }
                            }
                            this.medias[media_index] = {...media, 
                                errors: errors
                            };
                            
                            if(this.media.media_id == media_index){
                                this.media = this.medias[media_index];
                            }
                        });
                        
                    })
                    .finally(() => {
                        this.loading = false;
                    });
            },
            deleteFile(index){
                let media = {
                    media_id: null,
                    media_title: '', 
                    media_comment: '',
                    media_url: '',
                    media_nsfw: 0,
                    media_type_id: '',
                    media_galleries: [],
                    media_file: {},
                    media_has_file: false,
                    errors: {}
                }
                this.media = {...media};
                this.medias.splice(index, 1);
                for (let i = index; i < this.medias.length; i++) {
                    let reader = new FileReader();
                    reader.onload = (e) => {
                        this.$refs.media_files[i].src = reader.result;
                    };

                    reader.readAsDataURL(this.medias[i].media_file);
                }
            },
            editFile(media, index){
                this.media = media;
            },
            addFile(){
                this.deleteShit();
                /*this.medias.push({
                    ...{
                        media_id: null,
                        media_title: '', 
                        media_comment: '',
                        media_url: '',
                        media_nsfw: 0,
                        media_type_id: '',
                        media_galleries: [],
                        media_file: {},
                        media_has_file: false
                    }
                });
                this.medias[this.medias.length - 1].media_id =  this.medias.length - 1;
                //console.log(this.medias[this.medias.length - 1].media_file.name);
                this.$nextTick(() => {
                    var input_id = "file-" + (this.medias.length - 1);
                    document.getElementById(input_id).click();
                }); */
            },
            uploadImage(e) {
                let vm = this;
                var files = e.target.files;
             
                for (let i = 0; i < files.length; i++) {
                    console.log(files[i]);
                    this.medias.push({
                        media_id: null,
                        media_title: files[i].name, 
                        media_comment: 'cm1',
                        media_url: '',
                        media_nsfw: 0,
                        media_type_id: '',
                        media_galleries: [],
                        media_file: files[i],
                        media_has_file: true
                    });
                }

                for (let i = 0; i < this.medias.length; i++) {
                    let reader = new FileReader();
                    reader.onload = (e) => {
                        this.$refs.media_files[i].src = reader.result;

                        console.log(this.$refs.media_files[i].src);
                    };

                    reader.readAsDataURL(this.medias[i].media_file);
                }
            },
            //processFile(media, event, index) {
            processFile(event) {
                if(event.target.files.length > 0){
                    let files = event.target.files;

                    for (var i = 0; i < files.length; i++) {
                        let file = files[i];
                        this.medias.push({
                            media_id: null,
                            media_title: file.name, 
                            media_comment: 'cm1',
                            media_url: '',
                            media_nsfw: 0,
                            media_type_id: '',
                            media_galleries: [],
                            media_file: file,
                            media_has_file: true,
                            errors: {}
                        });
                        this.medias[this.medias.length - 1].media_id = (this.medias.length - 1);
                    }

                    for (let i = 0; i < this.medias.length; i++) {
                        let reader = new FileReader();
                        reader.onload = (e) => {
                            this.$refs.media_files[i].src = reader.result;
                            //console.log(this.$refs.media_files[i].src);
                        };

                        reader.readAsDataURL(this.medias[i].media_file);
                    }

                }
            },
        }
    }
</script>
