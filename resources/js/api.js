import axios from "axios";
import router from "./router";


const api = axios.create();

//start request
api.interceptors.request.use(config => {
    if (localStorage.getItem('authorisation_token')) {
        config.headers['Authorization'] = `Bearer ${localStorage.getItem('authorisation_token')}`
    }
    return config
}, error => {

})


//end request
api.interceptors.response.use(config => config,
        error => {
    if (error.response.data.message === "Token has expired") {
        return axios.post('api/refresh', {}, {
            headers: {
                'authorization': `Bearer ${localStorage.getItem('authorisation_token')}`
            }
        }).then(res => {
            localStorage.setItem('authorisation_token',res.data.authorisation_token)

            error.config.headers['Authorization'] = `Bearer ${res.data.authorisation_token}`

            return api.request(error.config)
        })
    }
    if (error.response.status === 401){
        router.push({ name: 'users.login' })

    }
})

export default api
