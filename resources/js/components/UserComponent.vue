<template>
    <nav class="navbar navbar-expand{-xsm|-sm|-md|-lg|-xl|-xxl} navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <div class="home_main">
                <router-link to="/" class="navbar-brand a_1">Home</router-link>
            </div>
            <div class="ul_log_reg">
                <ul class="navbar-nav me-auto mb-md-0">
                    <li class="nav-item person">
                        <router-link v-if="!authorisationToken" :to="{name:'users.login'}">Login</router-link>
                    </li>
                    <li class="nav-item person">
                        <router-link v-if="!authorisationToken" class="m-2" :to="{name:'users.registration'}">Registration</router-link>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto  mb-md-0">
                    <li class="nav-item person" >
                        <img class="avatar_img"
                             :src="image"
                             :class="{active: isActive}"
                             alt="avatar"
                             v-if="authorisationToken"
                             @click="sizeChange"
                        >
                        <p  class="m-2 user" v-if="authorisationToken">{{name}}</p>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto mb-md-0">
                    <li class="nav-item person">
                        <a v-if="authorisationToken" class="m-2" @click.prevent="logout" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="r_l_1">
        <div class="r_l_1_s">
            <button class="button-85"  v-if="authorisationToken" @click="showList">Lists</button>
        </div>
        <Home v-if="listAreVisible" v-model:listAreVisible="listAreVisible"></Home>
        <router-view v-else/>
    </div>

</template>

<script>
import Home from "./User/Home.vue";
import api from "../api";

    export default {
       name: 'UserComponent',
        components:{Home},
        data(){
           return {
               authorisationToken: null,
               listAreVisible:false,
               name: null,
               image: null,
               isActive: false,
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
            this.getUserName()
            this.getUserImage()
        },
        methods: {
           getAuthorisationToken(){
               this.authorisationToken = localStorage.getItem('authorisation_token')
           },
            showList(){
               this.listAreVisible=!this.listAreVisible
            },
            logout(){
               api.post('/api/logout')
                .then(res => {
                    localStorage.removeItem('authorisation_token');
                    this.$router.push({name: 'users.login'})
                })
            },
            getUserName(){
               api.get('/api/users/name')
                .then(res =>{
                    this.name= res.data
                })
            },
            getUserImage(){
               api.get('/api/users/image')
                .then(res => {
                    this.image=res.data
                })
            },
            sizeChange(){
               this.isActive = !this.isActive
            }
        },
        computed:{
           currentRoute(){
               return this.$route?.name
           }
        },
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
    align-items: center;
}
.nav-item a{
    font-size: 1.95vw;
}
.navbar-nav{
    flex-direction: row;
    padding-bottom: 0;
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
.user{
    font-size: 1.95vw;
    color: #7abaff;
}
.person{
    display: flex;
    flex-direction: row;
    align-items: center;
    position: relative;
}
.avatar_img{
    width: 2vw;
    height: 2vw;
    left: -2vw;
    border-radius: 50%;
    transition: all 0.3s ease;
    position: absolute;
}
.active{
    position: absolute;
    transition: all 0.3s ease;
    top: 5vw;
    right: 12vw;
    width: 12vw;
    height: 12vw;
}
.home_main{
    display: flex;
    flex-direction: row;
    align-items: center;
}
.log_item_ul{
    display: flex;
    height: 24px;
}
.log_item_li{
    height: 100%;
}
.log_item_a{
    margin: auto auto !important;
}
.material-icons{
    font-size: 2vw;
    color: #F2F3F5;
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
@media screen and (max-width: 768px){
    .material-icons{
    }
}
</style>
