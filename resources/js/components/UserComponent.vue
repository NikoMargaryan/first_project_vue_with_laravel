<template>
    <div >
        <router-link class="m-2" :to="{name:'fruit.index'}">List</router-link>
        <router-link v-if="!authorisationToken" :to="{name:'users.login'}">Login</router-link>
        <router-link v-if="!authorisationToken" class="m-2" :to="{name:'users.registration'}">Registration</router-link>
        <router-link v-if="authorisationToken" :to="{name:'users.personal'}">Personal</router-link>
        <a class="m-2" @click.prevent="logout" href="#">Logout</a>
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
        mounted() {
            this.getAuthorisationToken()
        },
        updated(){
            this.getAuthorisationToken()
        },
        methods: {
           getAuthorisationToken(){
               this.authorisationToken = localStorage.getItem('authorisation_token')
           },
            logout(){
               api.post('api/logout')
                .then(res => {
                    localStorage.removeItem('authorisation_token');
                    this.$router.push({name: 'users.login'})
                })
            }
        },
        beforeRouteUpdate(){

        }
    }
</script>
