<template>
    <div class="flex_main">
        <div class="login-box">
            <h1 class="title">Login</h1>
            <form>
                <div class="user-box">
                    <input type="email"
                    v-model="email"
                    required=""
                           placeholder="email"
                    >
                    <label>Email</label>
                </div>
                <div v-if="error" class="text-danger mb-3">
                    {{this.error}}
                </div>
                <div class="user-box">
                    <input type="password"
                    v-model="password"
                    required=""
                           placeholder="password"
                    >
                    <label>Password</label>
                </div>
                <a href="#" @click.prevent="login">
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

<style lang="scss">

.text-danger{
    font-size: 1vw;
}
.title {
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 3px;
    font-size: 3.5vw;
    line-height: 3.125vw;
    padding-bottom: 3.125vw;
    color: #00dbde;
    background: #00dbde;
    background: linear-gradient(to right,#00dbde  0%,#fc00ff  100%) !important;
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
}
.flex_main{
    position: relative;
}
.login-box {
    position: absolute;
    top: 14.9vw;
    left: 46.8vw;
    width: 26vw;
    padding: 2.6vw;
    transform: translate(-50%, -50%);
    background: rgba(0,0,0,.7);
    box-sizing: border-box;
    box-shadow: 0 0.97vw 1.62vw rgba(0,0,0,.6);
    border-radius: 0.65vw;
}

.login-box h2 {
    margin: 0 0 1.95vw;
    padding: 0;
    color: #fff;
    text-align: center;
}

.login-box .user-box {
    position: relative;
}

.login-box .user-box input {
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
.login-box .user-box label {
    position: absolute;
    top:0;
    left: 0;
    padding: 0.65vw 0;
    font-size: 1.04vw;
    color: #fff;
    display: none;
    pointer-events: none;
    transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
    position: absolute;
    top: -1.82vw ;
    left: 0;
    display: block;
    color: #03e9f4;
    font-size: 0.8vw;
}

.login-box form a {
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

.login-box a:hover {
    background: #03e9f4;
    color: #fff;
    border-radius: 0.33vw;
    box-shadow: 0 0 0.33vw #03e9f4,
    0 0 1.62vw #03e9f4,
    0 0 3.25vw #03e9f4,
    0 0 6.5vw #03e9f4;
}

.login-box a span {
    position: absolute;
    display: block;
}

.login-box a span:nth-child(1) {
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

.login-box a span:nth-child(2) {
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

.login-box a span:nth-child(3) {
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

.login-box a span:nth-child(4) {
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
@media screen and (max-width: 600px){
    .login-box .user-box input:focus ~ label,
    .login-box .user-box input:valid ~ label {
        top: -5px;
        left: 0;
    }
    .title{
        padding-bottom: 5px;
        margin-bottom: 0;
    }
}
@media screen and (max-width: 425px){
    .login-box .user-box input:focus ~ label,
    .login-box .user-box input:valid ~ label {
        top: 2px;
        left: 0;
    }
    .title{
        margin-bottom: 0;
    }
}
@media screen and (max-width: 250px){
    .login-box .user-box input:focus ~ label,
    .login-box .user-box input:valid ~ label {
        top: 5px;
        left: 0;
    }
}
</style>
