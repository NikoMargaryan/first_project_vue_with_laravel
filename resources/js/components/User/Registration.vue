<template>
    <div class="flex_main_reg">
        <div class="login-box_reg">
            <h1 class="title_reg">Registration</h1>
            <form>
                <div class="user-box_reg">
                    <input type="text"
                           v-model="name"
                           required=""
                    >
                    <label>Name</label>
                </div>
                <div class="user-box_reg">
                    <input type="email"
                           v-model="email"
                           required=""
                    >
                    <label>Email</label>
                </div>
                <div class="user-box_reg">
                    <input type="password"
                           v-model="password"
                           required=""
                    >
                    <label>Password</label>
                </div>
                <div class="user-box_reg">
                    <input type="password"
                           v-model="password_confirmation"
                           required=""
                    >
                    <label>Password Confirmation</label>
                </div>
                <div v-if="error" class="text-danger mb-3">
                    {{this.error}}
                </div>
                <a href="#" @click="store">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Send
                </a>
            </form>
        </div>
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

<style lang="scss">

.title_reg{
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 0.2vw;
    font-size: 2.5vw;
    line-height: 3.125vw;
    padding-bottom: 3.125vw;
    color: #00dbde;
    background: #00dbde;
    background: linear-gradient(to right,#00dbde  0%,#fc00ff  100%) !important;
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
}
.flex_main_reg{
    position: relative;
}
.login-box_reg {
    position: absolute;
    top: 18vw;
    left: 46.8vw;
    width: 26vw;
    padding: 2.6vw;
    transform: translate(-50%, -50%);
    background: rgba(0,0,0,.7);
    box-sizing: border-box;
    box-shadow: 0 0.97vw 1.62vw rgba(0,0,0,.6);
    border-radius: 0.65vw;
}

.login-box_reg h2 {
    margin: 0 0 1.95vw;
    padding: 0;
    color: #fff;
    text-align: center;
}

.login-box_reg .user-box_reg {
    position: relative;
}

.login-box_reg .user-box_reg input {
    width: 100%;
    padding: 0.65vw 0;
    font-size: 1.04vw;
    color: #fff;
    margin-bottom: 1.95vw;
    border: none;
    border-bottom: 1px solid #fff;
    outline: none;
    background: transparent;
}
.login-box_reg .user-box_reg label {
    position: absolute;
    top:0;
    left: 0;
    padding: 0.65vw 0;
    font-size: 1.04vw;
    color: #fff;
    pointer-events: none;
    transition: .5s;
}

.login-box_reg .user-box_reg input:focus ~ label,
.login-box_reg .user-box_reg input:valid ~ label {
    top: -1.82vw;
    left: 0;
    color: #03e9f4;
    font-size: 0.8vw;
}

.login-box_reg form a {
    position: relative;
    display: inline-block;
    padding: 0.65vw 1.3vw;
    color: #03e9f4;
    font-size: 1.04vw;
    text-decoration: none;
    text-transform: uppercase;
    overflow: hidden;
    transition: .5s;
    margin-top: 2.6vw;
    letter-spacing: 4px
}

.login-box_reg a:hover {
    background: #03e9f4;
    color: #fff;
    border-radius: 0.33vw;
    box-shadow: 0 0 0.33vw #03e9f4,
    0 0 1.62vw #03e9f4,
    0 0 3.25vw #03e9f4,
    0 0 6.5vw #03e9f4;
}

.login-box_reg a span {
    position: absolute;
    display: block;
}

.login-box_reg a span:nth-child(1) {
    top: 0;
    left: -100%;
    width: 100%;
    height: 0.13vw;
    background: linear-gradient(90deg, transparent, #03e9f4);
    animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
    0% {
        left: -100%;
    }
    50%,100% {
        left: 100%;
    }
}

.login-box_reg a span:nth-child(2) {
    top: -100%;
    right: 0;
    width: 0.13vw;
    height: 100%;
    background: linear-gradient(180deg, transparent, #03e9f4);
    animation: btn-anim2 1s linear infinite;
    animation-delay: .25s
}

@keyframes btn-anim2 {
    0% {
        top: -100%;
    }
    50%,100% {
        top: 100%;
    }
}

.login-box_reg a span:nth-child(3) {
    bottom: 0;
    right: -100%;
    width: 100%;
    height: 0.13vw;
    background: linear-gradient(270deg, transparent, #03e9f4);
    animation: btn-anim3 1s linear infinite;
    animation-delay: .5s
}

@keyframes btn-anim3 {
    0% {
        right: -100%;
    }
    50%,100% {
        right: 100%;
    }
}

.login-box_reg a span:nth-child(4) {
    bottom: -100%;
    left: 0;
    width: 0.13vw;
    height: 100%;
    background: linear-gradient(360deg, transparent, #03e9f4);
    animation: btn-anim4 1s linear infinite;
    animation-delay: .75s
}

@keyframes btn-anim4 {
    0% {
        bottom: -100%;
    }
    50%,100% {
        bottom: 100%;
    }
}

//@media screen and (max-width: 1024px){
//    .title_reg{
//        font-size: 20px;
//        letter-spacing: 0;
//    }
//}
//@media screen and (max-width: 685px){
//    .title_reg{
//        font-size: 15px;
//    }
//}
@media screen and (max-width: 600px){
    .login-box_reg .user-box_reg input:focus ~ label,
    .login-box_reg .user-box_reg input:valid ~ label {
        top: -5px;
        left: 0;
    }
    .title_reg{
        padding-bottom: 5px;
        margin-bottom: 0;
    }
}
@media screen and (max-width: 425px){
    .login-box_reg .user-box_reg input:focus ~ label,
    .login-box_reg .user-box_reg input:valid ~ label {
        top: 2px;
        left: 0;
    }
    .title_reg{
        margin-bottom: 0;
    }
}
@media screen and (max-width: 270px){
    .login-box_reg {
        position: absolute;
        top: 50px;
    }
}
@media screen and (max-width: 250px){
    .login-box_reg .user-box_reg input:focus ~ label,
    .login-box_reg .user-box_reg input:valid ~ label {
        top: 5px;
        left: 0;
    }
}
</style>
