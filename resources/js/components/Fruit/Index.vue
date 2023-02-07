<template>
    <div>
        <table class="table table-dark table-hover dark">
            <thead>
            <tr>
                <th scope="col" class="col_index">#</th>
                <th scope="col" class="col_index">Name</th>
                <th scope="col" class="col_index">Price</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="fruit in fruits">
                <th scope="row" class="row_index">{{fruit.id}}</th>
                <td class="row_index">{{fruit.name}}</td>
                <td class="row_index">{{fruit.price}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import api from "../../api";

export default {
    name: "Index",
    data(){
        return {
            fruits: null,
        }
    },
    mounted() {
      this.getFruits()
    },
    methods: {
        getFruits(){
            api.get('/api/fruits')
                .then(res => {
                        this.fruits= res.data.data
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
.col_index{
    font-size: 1vw;
    padding: 0.52vw;
}
.row_index{
    font-size: 0.8vw;
    padding: 0.52vw;
}
</style>
