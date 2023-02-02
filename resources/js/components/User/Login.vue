<template>
    <div class="w-25">
        <input v-model="email" type="email" class="form-control mt-3 mb-3" placeholder="email">
        <input v-model="password" type="password" class="form-control mb-3" placeholder="password">
        <input @click.prevent="login" type="submit" class="btn btn-primary mb-3">
    </div>
</template>

<script>
export default {
    name: "Login",
    data(){
        return {
            email: null,
            password: null
        }
    },
    methods: {
        login(){
            axios.post('/api/login',{
                email: this.email,
                password: this.password
            }).then(res => {
                localStorage.setItem('authorisation_token',res.data.authorisation.token)
                this.$router.push({  name: 'users.personal' })
                // const data={
                //     name: 'Abraham',
                //     token: 'res.data.authorisation.token'
                // }
                // localStorage.setItem('some_data',JSON.stringify(data))
                //
                // console.log(JSON.parse(localStorage.setItem('some_data')))

            })
        }
    }
}
</script>

<style scoped>

</style>
