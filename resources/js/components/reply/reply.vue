<template>
    <div class="mt-4">
        <v-card>
            <v-card-title>
                <div class="headline">{{data.user}}</div>
                <div class="ml-2">said {{data.created_at}}</div>
            </v-card-title>
            <v-divider/>
            <v-card-text v-html="data.reply"/>
            <v-card-actions  v-if="own">
                <v-btn class="ma-2" small dark @click="edit">Edit
                    <v-icon dark right>mdi-pencil</v-icon>
                </v-btn>
                <v-btn class="ma-2" small dark @click="destroy">Delete
                    <v-icon dark right>mdi-delete</v-icon>
                </v-btn>
            </v-card-actions>
        </v-card>
    </div>
</template>
<script>
    export default{
        props:['data'],
        data(){return{
            own : User.own(this.data.user_id),
        }},
        methods:{
            edit(){

            },
            destroy(){},
        },
    }
</script>
