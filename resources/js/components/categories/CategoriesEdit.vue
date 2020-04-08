<template>
<div>
    <h1 v-if="loading">Loading...</h1>

    <form @submit.prevent="onSubmit">
        <span class="help is-danger" v-text="errors"></span>

        <input type="text" class="form-control" v-model="category.category_name">
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
                category: {},
                loading: true
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created() {
            this.id = this.$route.params.id;
            this.axios.get(`${LARAVEL._BASE_URL}/admin/categories/${this.id}`)
            .then(response => {
                console.log(response.data);
                this.loading = false;
                this.category = response.data;
            });
        },
        methods: {
            onSubmit() {
                this.category._token = LARAVEL._TOKEN;
                this.axios.put(`${LARAVEL._BASE_URL}/admin/categories/${this.id}`, this.category)
                .then(response => {
                    this.category = response.data;
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                }); 
            }
        }
    }
</script>
