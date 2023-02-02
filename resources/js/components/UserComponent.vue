<template>
    <div >
        <router-link class="m-2" :to="{name:'fruit.index'}">List</router-link>
        <router-link :to="{name:'users.login'}">Login</router-link>
        <router-link class="m-2" :to="{name:'users.registration'}">Registration</router-link>
        <router-link  :to="{name:'users.personal'}">Personal</router-link>
        <router-view></router-view>
    </div>

</template>

<script>
    export default {
       name: 'UserComponent',
    }
</script>
