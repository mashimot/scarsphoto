<template>
<div>
    <h1 v-if="loading">Loading...</h1>

    <form @submit.prevent="onSubmit" v-if="!loading">
        <span class="help is-danger" v-text="errors"></span>
        <div class="form-group">
            <label for="contact_name">Nome</label>
            <input id="contact_name" type="text" class="form-control" v-model="contact.contact_name" :class="{ 'is-invalid': form.errors.has('contact_name') }">
            <div v-if="form.errors.has('contact_name')" v-text="form.errors.first('contact_name')" class="invalid-feedback"></div>
        </div>
        <div class="form-group">
            <label for="contact_email">Email</label>
            <input id="contact_email" type="text" class="form-control" v-model="contact.contact_email" :class="{ 'is-invalid': form.errors.has('contact_email') }">
            <div v-if="form.errors.has('contact_email')" v-text="form.errors.first('contact_email')" class="invalid-feedback"></div>
        </div>
        <div class="form-group">
            <label for="contact_phone">Telefone</label>
            <input id="contact_phone" type="text" class="form-control" v-model="contact.contact_phone" :class="{ 'is-invalid': form.errors.has('contact_phone') }">
            <div v-if="form.errors.has('contact_phone')" v-text="form.errors.first('contact_phone')" class="invalid-feedback"></div>
        </div>
        <div class="form-group">
            <label for="contact_subject">Assunto</label>
            <input id="contact_subject" type="text" class="form-control" v-model="contact.contact_subject" :class="{ 'is-invalid': form.errors.has('contact_subject') }">
            <div v-if="form.errors.has('contact_subject')" v-text="form.errors.first('contact_subject')" class="invalid-feedback"></div>
        </div>
        <div class="form-group">
            <label for="contact_message">Mensagem</label>
            <textarea id="contact_message" class="form-control" cols="30" rows="10" v-model="contact.contact_message" :class="{ 'is-invalid': form.errors.has('contact_message') }"></textarea>
            <div v-if="form.errors.has('contact_message')" v-text="form.errors.first('contact_message')" class="invalid-feedback"></div>
        </div>        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>    
</template>

<script>
    import Form from 'form-backend-validation';

    export default {
        data(){
            return {
                id: -1,
                errors: '',
                form: new Form(),
                loading: true
            }
        },
        components: {
        },
        mounted() {
            console.log('Component mounted.')
        },
        created() {
            this.id = this.$route.params.id;
            this.axios.get(`${Laravel._BASE_URL}/admin/contacts/${this.id}`)
            .then(response => {
                this.contact = response.data;
            })
            .finally(() => {
                this.loading = false;
            });
        },
        methods: {
            onSubmit() {
                this.loading = true;
                this.contact._token = Laravel.csrfToken;
                this.form = new Form(this.contact);
                this.form.put(`${Laravel._BASE_URL}/admin/contacts/${this.id}`, this.contact)
                .then(response => {
                    //this.contact = response.data;
                })
                .catch(error => {
                    //this.contact.errors = error.response.data.errors;
                    console.log('form', this.contact.errors.all());
                })
                .finally(() => {
                    this.loading = false;
                }); 
            }
        }
    }
</script>
