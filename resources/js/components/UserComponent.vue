<template>
    <nav class="navbar navbar-expand{-xsm|-sm|-md|-lg|-xl|-xxl} navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <router-link to="/" class="navbar-brand a_1">Home</router-link>

            <div class="ul_log_reg">
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
    <div class="r_l_1">
        <div class="r_l_1_s">
            <router-link class="button-85" v-if="authorisationToken" :to="{name:'users.home'}">Lists</router-link>
        </div>
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
.a_1{
    font-size: 1.95vw;
}
a{
    text-decoration: none;
    color: #7abaff;
}
.ul_log_reg{
    display: flex;
}
.nav-item a{
    font-size: 1.95vw;
}
.navbar-nav{
    flex-direction: row;
}
.r_l_1{
    display: flex;
    flex-direction: column;
    gap: 3vw;
}
.r_l_1_s{
    display: flex;
    justify-content: center;
}
.button-85 {
    padding: 0.6vw 2vw;
    border: none;
    outline: none;
    color: red;
    background: #111;
    cursor: pointer;
    position: relative;
    z-index: 0;
    font-size: 1.3vw;
    border-radius: 0.65vw;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
}

.button-85:before {
    content: "";
    background: linear-gradient(
            45deg,
            #ff0000,
            #ff7300,
            #fffb00,
            #48ff00,
            #00ffd5,
            #002bff,
            #7a00ff,
            #ff00c8,
            #ff0000
    );
    position: absolute;
    top: -2px;
    left: -2px;
    background-size: 400%;
    z-index: -1;
    filter: blur(5px);
    -webkit-filter: blur(5px);
    width: calc(100% + 4px);
    height: calc(100% + 4px);
    animation: glowing-button-85 20s linear infinite;
    transition: opacity 0.3s ease-in-out;
    border-radius: 0.65vw;
}

@keyframes glowing-button-85 {
    0% {
        background-position: 0 0;
    }
    50% {
        background-position: 400% 0;
    }
    100% {
        background-position: 0 0;
    }
}

.button-85:after {
    z-index: -1;
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    background: #222;
    left: 0;
    top: 0;
    border-radius: 0.65vw;
}
.button-85:hover{
     opacity:0.9;
     cursor:pointer;
 }
.button-85:active{
    box-shadow:1px 1px 5px rgb(0,0,0,0.5);
}

</style>
