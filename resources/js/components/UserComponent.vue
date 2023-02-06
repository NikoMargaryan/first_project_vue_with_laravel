<template>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <router-link to="/" class="navbar-brand">Home</router-link>

            <div>
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <router-link v-if="!authorisationToken" :to="{name:'users.login'}">Login</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link v-if="!authorisationToken" class="m-2" :to="{name:'users.registration'}">Registration</router-link>
                    </li>
                </ul>

                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a v-if="authorisationToken" class="m-2" @click.prevent="logout" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="p-3">
        <router-link class="p-5" v-if="authorisationToken" :to="{name:'users.home'}">Lists</router-link>
        <router-view></router-view>
    </div>

</template>

<script>
import api from "../api";

    export default {
       name: 'UserComponent',
        data(){
           return {
               authorisationToken: null
           }
        },
        watch:{
            currentRoute:{
                handler(value){
                    this.getAuthorisationToken()
                },
                immediate:true
            }
        },
        mounted() {
            this.getAuthorisationToken()
        },
        methods: {
           getAuthorisationToken(){
               this.authorisationToken = localStorage.getItem('authorisation_token')
           },
            logout(){
               api.post('/api/logout')
                .then(res => {
                    localStorage.removeItem('authorisation_token');
                    this.$router.push({name: 'users.login'})
                })
            }
        },
        computed:{
           currentRoute(){
               return this.$route?.name
           }
        }
    }
</script>

<style lang="scss">
a{
    text-decoration: none;
    color: #7abaff;
}
.p-5{
    display: flex;
    justify-content: center;
    color: red;
    font-size: 25px;
    height: 15px;
    align-items: center;
}
.p-5:hover{
    color: darkred;
}
</style>
