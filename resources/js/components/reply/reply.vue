<template>
    <div class="mt-4">
        <v-card>
            <v-card-title>
                <div class="headline">{{data.user}}</div>
                <div class="ml-2">said {{data.created_at}}</div>
            </v-card-title>
            <v-divider/>
            <edit-reply
                :reply="data"
                v-if="editing"
            />
            <v-card-text v-else v-html="reply"/>
            <v-card-actions  v-if="own && !editing">
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
    import editReply from "./editReply.vue"
    export default{
        components:{
            editReply,
        },
        props:['data','index'],
        data(){return{
            own : User.own(this.data.user_id),
            editing:false,
        }},
        created:{
            this.listen()
        },
        methods:{
            listen(){
                EventBus.$on('clearEditing'()=>{this.editing = false})
            }
            edit(){
                this.editing = true
            },
            destroy(){
                EventBus.$emit('deleteReply',this.index)
            },
        },
        computed:{
            reply(){
                return md.parse(this.data.reply)
            }
        },
    }
</script>
