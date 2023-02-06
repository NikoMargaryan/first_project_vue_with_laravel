<template>
    <div>
        <table class="table table-dark table-hover dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users">
                <th scope="row">{{user.id}}</th>
                <td>{{user.name}}</td>
                <td>{{user.email}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import api from "../../api";

export default {
    name: "Users",
    data(){
        return {
            users: null,
        }
    },
    mounted() {
        this.getUsers()
    },
    methods: {
        getUsers(){
            api.get('api/users')
                .then(res => {
                    this.users= res.data.data
                })
        },
    }
}
</script>

<style scoped>
div{
    display: flex;
    justify-content: center;
}
.dark{
    width: 80%;
}
</style>
