<template>
    <div>
            <vue-simplemde v-model="form.body"/>
            <div class="mt-5">
                <v-btn class="ma-2" color="blue" @click="send">Send</v-btn>
            </div>
    </div>
</template>
<script>
    export default {
        data(){return{
            form:{body:null,}
        }},
        methods:{
            send(){
                axios.post(`/api/question/${this.$route.params.slug}/reply`,{body:this.form.body})
                    .then(({data:{reply}}) => {
                        this.form.body = ''
                        EventBus.$emit('newReply',reply)
                        window.scrollTo(0,0)
                    })

            }
        },
    }
</script>
