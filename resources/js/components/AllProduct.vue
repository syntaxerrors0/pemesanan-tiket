<template>
    <div>
        <h2 class="text-center">tikets List</h2>
 
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Detail</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="tiket in tikets" :key="tiket.id">
                <td>{{ tiket.id }}</td>
                <td>{{ tiket.name }}</td>
                <td>{{ tiket.detail }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: tiket.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deletetiket(tiket.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                tikets: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/tikets/')
                .then(response => {
                    this.tikets = response.data;
                });
        },
        methods: {
            deletetiket(id) { 
                this.axios
                    .delete(`http://localhost:8000/api/tikets/${id}`)
                    .then(response => {
                        let i = this.tikets.map(data => data.id).indexOf(id);
                        this.tikets.splice(i, 1)
                    });
            }
        }
    }
</script>