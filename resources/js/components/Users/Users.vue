<template>
    <div>
        <table class="table table-dark table-hover dark">
            <thead>
            <tr>
                <th scope="col" class="col_users">#</th>
                <th scope="col" class="col_users">Name</th>
                <th scope="col" class="col_users">Email</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users">
                <th scope="row" class="row_users">{{user.id}}</th>
                <td class="row_users">{{user.name}}</td>
                <td class="row_users">{{user.email}}</td>
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
.col_users{
    font-size: 1vw;
    padding: 0.52vw;
}
.row_users{
    font-size: 0.8vw;
    padding: 0.52vw;
}
</style>
