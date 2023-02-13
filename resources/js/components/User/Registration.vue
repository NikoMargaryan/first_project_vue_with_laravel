<template>
    <div class="flex_main_reg">
        <div class="login-box_reg">
            <h1 class="title_reg">Registration</h1>
                <div class="user-box_reg">
                    <input type="text"
                           v-model="name"
                           required=""
                           id="form"
                           placeholder="name"
                    >
                </div>
                <div class="user-box_reg">
                    <input type="email"
                           v-model="email"
                           required=""
                           placeholder="email"
                    >
                </div>
                <div class="user-box_reg">
                    <input type="password"
                           v-model="password"
                           required=""
                           placeholder="password"
                    >
                </div>
                <div class="user-box_reg">
                    <input type="password"
                           v-model="password_confirmation"
                           required=""
                           placeholder="password_confirmation"
                    >
                </div>
                <div class="reg">
                    <input type="file"
                           @change="getImage"
                           required=""
                           id="upload"
                           hidden
                           class="file_input"
                    >
                    <label for="upload">Choose File</label>
                </div>
                <div v-if="error" class="text-danger mb-3">
                    {{this.error}}
                </div>
                <div class="button_send">
                    <a href="#" @click.prevent="store">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Send
                    </a>
                </div>
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
            image: null,
        }
    },
    methods: {
        getImage(e){
            this.image=e.target.files[0]
        },
        store(){
            let data=new FormData
            data.append('name',this.name)
            data.append('email',this.email)
            data.append('password',this.password)
            data.append('password_confirmation',this.password_confirmation)
            data.append('image',this.image)
            axios.post('/api/users', data).then(res => {
                localStorage.setItem('authorisation_token', res.data.authorisation_token)
                this.$router.push({ name:'users.home' })
            })
            .catch(error => {
                this.error= error.response.data.message
            })
        }
    }
}
</script>

<style lang="scss">
.reg{
    label {
        background-color: indigo;
        color: white;
        padding: 0.5vw;
        font-family: sans-serif;
        border-radius: 0.3vw;
        cursor: pointer;
        margin-top: 1vw;
        font-size: 1.04vw;
    }
}
.text-danger{
    font-size: 1vw;
}
.title_reg{
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 0.2vw;
    font-size: 2.5vw;
    margin: 0;
    line-height: 3vw;
    padding-bottom: 3vw;
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
    height: 37vw;
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
    height: 4vw;
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
    height: 2vw;
    background: transparent;
}

.button_send a {
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

.button_send a:hover {
    background: #03e9f4;
    color: #fff;
    border-radius: 0.33vw;
    box-shadow: 0 0 0.33vw #03e9f4,
    0 0 1.62vw #03e9f4,
    0 0 3.25vw #03e9f4,
    0 0 6.5vw #03e9f4;
}

.button_send a span {
    position: absolute;
    display: block;
}

.button_send a span:nth-child(1) {
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

.button_send a span:nth-child(2) {
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

.button_send a span:nth-child(3) {
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

.button_send a span:nth-child(4) {
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
</style>
