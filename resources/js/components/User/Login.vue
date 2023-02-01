<template>
    <div class="w-25">
        <input v-model="email" type="email" class="form-control mt-3 mb-3" placeholder="email">
        <input v-model="password" type="password" class="form-control mb-3" placeholder="password">
        <input @click="login" type="submit" class="btn btn-primary mb-3">
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
            }).then(res=> {
                console.log(res.data.data);
            })
        }
    }
}
</script>

<style scoped>

</style>
