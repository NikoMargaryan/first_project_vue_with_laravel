<template>
    <div>
        <router-link class="m-2" :to="{name:'fruit.index'}">List of fruits</router-link>
        <router-link class="m-2" :to="{name:'users'}">List of users</router-link>
    </div>
</template>

<script>
export default {
    name: "Home"
}
</script>

<style scoped>
.m-2{
    font-size: 20px;
}
</style>
