<template>
<div class="w-25">
    <input v-model="email" type="email" class="form-control mt-3 mb-3" placeholder="Email">
    <input v-model="name" type="text" class="form-control mb-3" placeholder="Name">
    <input v-model="password" type="password" class="form-control mb-3" placeholder="Password">
    <input v-model="password_confirmation" type="password" class="form-control mb-3" placeholder="Repeat password">
    <input @click.prevent="storeUser" type="submit" class="btn btn-primary" value="Send">
</div>
</template>

<script>
export default {
    name: "Registration",
    data(){
        return {
            email:'',
            name:'',
            password:'',
            password_confirmation:''
        }
    },
    methods:{
        storeUser(){
            axios.post('/api/users',{email: this.email, name: this.name,
                password: this.password, password_confirmation: this.password_confirmation})
            .then(res=>{
                console.log(res);
            })
        }
    }
}
</script>

<style scoped>

</style>
