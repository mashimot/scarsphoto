<template>
<div>
    <h1 v-if="loading">Loading...</h1>
    <table class="table table-stripped" v-if="!loading">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Tópico</th>
                <th>Mensagem</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="contact in contacts.data" :key="contact.contact_id">
                <td>{{ contact.contact_id }}</td>
                <td>{{ contact.contact_name }}</td>
                <td>{{ contact.contact_email }}</td>
                <td>{{ contact.contact_phone }}</td>
                <td>{{ contact.contact_subject }}</td>
                <td>{{ contact.contact_message }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{ name: 'admin.contacts.edit', params: { id: contact.contact_id } }" class="btn btn-primary">
                            Edit
                        </router-link>                               
                        <button class="btn btn-danger" @click="deleteContact(contact.contact_id)">Delete</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <pagination :data="contacts" @pagination-change-page="getContacts"></pagination>
</div>

</template>

<script>
    export default {
        data() {
            return {
                contacts: {},
                loading: true
            }
        },
        created() {
            this.getContacts();
        },
        methods: {
            getContacts(page = 1){
                this.axios
                    .get(`${Laravel._BASE_URL}/admin/contacts/create`, {
                        params: {
                            page: page
                        }
                    })
                    .then(response => {
                        console.log(response);
                        this.contacts = response.data;
                    })
                    .finally(() => {
                        this.loading = false;
                    });
            },
            deleteContact(id) {
                this.axios
                .delete(`${Laravel._BASE_URL}/admin/contacts/${id}`)
                .then(response => {
                    console.log(response.data);
                    let i = this.contacts.map(item => item.contact_id).indexOf(id); // find index of your object
                    this.contacts.splice(i, 1)
                })
            }
        }
    }
</script>
