<template>
    <v-container>
        <form @submit.prevent="login">
            <v-text-field
                v-model="form.email"
                label="E-mail"
                type="email"
            ></v-text-field>
            <span class="red--text" v-if="errors.email">{{errors.email[0]}}</span>

            <v-text-field
                v-model="form.password"
                label="Password"
                type="password"
            ></v-text-field>
            <span class="red--text" v-if="errors.password">{{errors.password[0]}}</span>

            <div class="m-5">
<!--                <span class="red&#45;&#45;text" v-if="errors.none">{{errors.none[0]}}</span>-->
                <v-alert type="error" v-if="errors.none">
                    {{errors.none[0]}}
                </v-alert>

            </div>
            <div class="mt-5">
                <v-btn class="mr-4" type="submit" color="green">Login</v-btn>
                <router-link to="/signup">
                    <v-btn class="mr-4" type="submit" color="blue">Signup</v-btn>
                </router-link>
            </div>
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
                errors:{}
            }
        },
        created(){ if(User.loggedIn()){this.$router.push({name:'forum'})} },

        methods:{
            login(){
                axios.post('api/auth/login',this.form)
                    .then(res => { User.responseAfterLogin(res) })
                   .catch(e => {this.errors = e.response.data.errors })
            },
        }
    }
</script>
