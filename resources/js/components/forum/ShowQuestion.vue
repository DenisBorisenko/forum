<template>
    <v-card>
        <v-container fluid>
        <v-card-title>
            <div>
                <div class="headline">
                    {{data.title}}
                </div>
                <span class="grey--text">{{data.user}} said {{data.created_at}}</span>

            </div>
            <v-spacer></v-spacer>
            <v-btn class="teal">5 Replies</v-btn>
        </v-card-title>
            <v-card-text v-html="body"></v-card-text>
        </v-container>
        <v-card-actions v-if="own">
            <v-btn class="ma-2" small dark>Edit
                <v-icon dark right>mdi-pencil</v-icon>
            </v-btn>
            <v-btn class="ma-2" small dark>Delete
                <v-icon dark right>mdi-delete</v-icon>
            </v-btn>
        </v-card-actions>

    </v-card>
</template>
<script>
    export default {
        props:['data'],
        data(){return{
            own : User.own(this.data.user_id)
        }},
        computed:{
            body(){
                return md.parse( this.data.body)
            }
        },
    }
</script>
