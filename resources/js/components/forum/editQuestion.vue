<template>
    <v-container fluid>
            <form @submit.prevent="update">
                <v-text-field
                    v-model="form.title"
                    label="Title"
                    type="text"
                ></v-text-field>
                <!--        <span class="red&#45;&#45;text" v-if="errors.email">{{errors.email[0]}}</span>-->


                <vue-simplemde v-model="form.body"/>

                <v-card-actions>
                    <v-btn class="ma-2" small dark type="submit">Edit
                        <v-icon dark right>mdi-check</v-icon>
                    </v-btn>
                    <v-btn class="ma-2" small dark @click="cancel">Cancel
                        <v-icon dark right>mdi-cancel</v-icon>
                    </v-btn>
                </v-card-actions>
            </form>
    </v-container>
</template>
<script>
    export default {
        props:['data'],
        data(){return{
            form:{
                title:null,
                body:null,
            },
            errors:{},
        }},
        created(){
            this.form = this.data
        },
        methods:{
            update(){
                axios.patch(`/api/question/${this.form.slug}`,this.form)
                    .then(res => {this.cancel()})
                    .catch(e => {console.log(e)})
            },
            cancel(){
                EventBus.$emit('cancelEditing')
            },
        },
    }
</script>
