<template>
    <div>
        <v-toolbar dark>
            <v-toolbar-title>FORUM</v-toolbar-title>
            <v-spacer></v-spacer>
            <div>
                <v-btn text>Forum</v-btn>
                <v-btn text>Ask question</v-btn>
                <v-btn text>Category</v-btn>
                <router-link to="/login">
                    <v-btn text>Login</v-btn>
                </router-link>
            </div>
        </v-toolbar>
    </div>
</template>
<script>
    export default{

    }
</script>
