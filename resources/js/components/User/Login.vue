<template>
    <div class="w-25">
        <input v-model="email" type="email" class="form-control mt-3 mb-3" placeholder="email">
        <div v-if="error" class="text-danger mb-3">
            {{this.error}}
        </div>
        <input v-model="password" type="password" class="form-control mb-3" placeholder="password">
        <button @click.prevent="login" type="button" class="btn btn-primary mb-3">Send</button>
    </div>
</template>

<script>
export default {
    name: "Login",
    data(){
        return {
            email: null,
            password: null,
            error: null
        }
    },
    methods: {
        login(){
            axios.post('/api/login',{
                email: this.email,
                password: this.password
            }).then(res => {
                localStorage.setItem('authorisation_token', res.data.authorisation.token)
                this.$router.push({  name: 'users.home' })
                // const data={
                //     name: 'Abraham',
                //     token: 'res.data.authorisation.token'
                // }
                // localStorage.setItem('some_data',JSON.stringify(data))
                //
                // console.log(JSON.parse(localStorage.setItem('some_data')))

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
