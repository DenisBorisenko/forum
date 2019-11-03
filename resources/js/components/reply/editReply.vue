<template>
    <div>
        <vue-simplemde v-model="reply.reply"/>

        <v-btn class="ma-2" small dark @click="edit">Edit
            <v-icon dark right>mdi-check</v-icon>
        </v-btn>
        <v-btn class="ma-2" small dark @click="cancel">Cancel
            <v-icon dark right>mdi-cancel</v-icon>
        </v-btn>
    </div>
</template>
<script>
export default{
    props:['reply'],
    methods:{
        edit(){
            axios.patch(`/api/question/${this.$route.params.slug}/reply/${this.reply.id}`,{body : this.reply.reply})
                .then(res => {this.cancel()})
                .catch(e => {console.log(e)})
        },
        cancel(){
            EventBus.$emit('cancelEditing')
        },
    },

}
</script>
