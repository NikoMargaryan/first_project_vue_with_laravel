<template>
    <div class="w-25">
        <input v-model="name" type="text" class="form-control mt-3 mb-3" placeholder="name">
        <input v-model="email" type="email" class="form-control mb-3" placeholder="email">
        <div v-if="error" class="text-danger mb-3">{{error}}</div>
        <input v-model="password" type="password" class="form-control mb-3" placeholder="password">
        <input v-model="password_confirmation" type="password" class="form-control mb-3" placeholder="confirm password">
        <button @click="store" type="button" class="btn btn-primary">Send</button>
    </div>
</template>

<script>
export default {
    name: "Registration",
    data(){
        return{
            name: null,
            email: null,
            password: null,
            password_confirmation: null,
            error: null,
        }
    },
    mounted() {
        // console.log(localStorage.getItem('authorisation_token'));
    },
    methods: {
        store(){
            axios.post('/api/users', {
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation,
            }).then(res => {
                localStorage.setItem('authorisation_token', res.data.authorisation_token)
                this.$router.push({ name:'users.personal' })
            })
            .catch(error => {
                this.error= error.response.data.message
            })
        }
    }
}
</script>

<style scoped>

</style>
