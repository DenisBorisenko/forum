<template>
    <v-container>
        <form @submit.prevent="login">
            <v-text-field
                v-model="form.email"
                label="E-mail"
                type="email"
                required
            ></v-text-field>
            <v-text-field
                v-model="form.password"
                label="Password"
                type="password"
                required
            ></v-text-field>

            <v-btn class="mr-4" type="submit" color="green">Login</v-btn>
            <router-link to="/signup">
                <v-btn class="mr-4" type="submit" color="blue">Signup</v-btn>
            </router-link>
        </form>
    </v-container>
</template>
<script>
    export default {
        data(){
            return{
                form:{
                  email:null,
                  password:null,
                },
            }
        },
        methods:{
            login(){
               User.login(this.form)
                this.$router.push({name:'forum'})

            },
        }
    }
</script>
