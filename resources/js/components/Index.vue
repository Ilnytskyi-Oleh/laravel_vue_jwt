<template>
   <div class="p-5">
       <router-link v-if="accessToken" :to="{name:'fruit.index'}">Fruit</router-link>
       <router-link v-if="!accessToken" :to="{name:'user.login'}">Login</router-link>
       <router-link v-if="!accessToken" :to="{name:'user.registration'}">Registration</router-link>
       <router-link v-if="accessToken" :to="{name:'user.personal'}">Personal</router-link>
       <a href="#" @click.prevent="logout" v-if="accessToken" >LogOut</a>
       <router-view></router-view>
   </div>
</template>

<script>
import api from "../api";

export default {
    name: "Index",
    data(){
        return{
            accessToken:'',
        }
    },
    mounted() {
        this.getAccessToken()
    },
    updated() {
        this.getAccessToken()
    },
    methods:{
        getAccessToken(){
            this.accessToken = localStorage.getItem('access_token')
        },
        logout(){
            api.post('/api/auth/logout',{})
                .then(res => {
                    localStorage.removeItem('access_token')
                    this.$router.push({name:'user.login'})
                })
        }
    }
}
</script>

<style scoped>

</style>
