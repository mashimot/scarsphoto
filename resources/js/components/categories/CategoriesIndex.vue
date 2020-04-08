<template>
    <table class="table table-stripped">
    <thead>
    <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Data Criação</th>
    </tr>
    </thead>
        <tbody>
            <tr v-for="category in categories" :key="category.category_id">
                <td>{{ category.category_id }}</td>
                <td>{{ category.category_name }}</td>
                <td>{{ category.created_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{ name: 'admin.categories.edit', params: { id: category.category_id } }" class="btn btn-primary">
                            Edit
                        </router-link>                               
                        <button class="btn btn-danger" @click="deleteCategory(category.category_id)">Delete</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        data() {
            return {
                categories: []
            }
        },
        created() {
            this.axios
            .get(`${LARAVEL._BASE_URL}/admin/categories/create`)
            .then(response => {
                console.log(response);
                this.categories = response.data;
            });
        },
        methods: {
            deleteCategory(id) {
                this.axios
                .delete(`${LARAVEL._BASE_URL}/admin/categories/${id}`)
                .then(response => {
                    console.log(response.data);
                    let i = this.categories.map(item => item.category_id).indexOf(id); // find index of your object
                    this.categories.splice(i, 1)
                })
            }
        }
    }
</script>
