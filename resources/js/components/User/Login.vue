<template>
    <div class="w-25">
        <input v-model="email" type="email" class="form-control mt-3 mb-3" placeholder="Email">
        <input v-model="password" type="password" class="form-control mb-3" placeholder="Password">
        <input @click.prevent="login" type="submit" class="btn btn-primary" value="Send">
        <div class="text-danger" v-if="error">{{error}}</div>
    </div>
</template>

<script>
export default {
    name: "Login",
    data(){
        return {
            email:'',
            password:'',
            error:'',
        }
    },
    methods:{
        login(){
            axios.post('/api/auth/login',{email:this.email, password: this.password})
            .then(res => {
                localStorage.setItem('access_token',res.data.access_token)
                this.$router.push({name:'user.personal'})
            }).catch(error => {
                this.error = error.response.data.error
            })
        }
    }
}
</script>

<style scoped>

</style>
