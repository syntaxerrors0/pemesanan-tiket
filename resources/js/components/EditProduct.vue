<template>
    <div>
        <h3 class="text-center">Edit tiket</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateTiket">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="tiket.name">
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <input type="text" class="form-control" v-model="tiket.detail">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                tiket: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/tikets/${this.$route.params.id}`)
                .then((res) => {
                    this.tiket = res.data;
                });
        },
        methods: {
            updateTiket() {
                this.axios
                    .patch(`http://localhost:8000/api/tikets/${this.$route.params.id}`, this.tiket)
                    .then((res) => {
                        this.$router.push({ name: 'home' });
                    });
            }
        }
    }
</script>