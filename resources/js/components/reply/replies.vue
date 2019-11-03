<template>
    <div>
        <reply
            v-for="(reply,index) in content"
            :key="reply.id"
            :index="index"
            :data="reply"/>
    </div>
</template>
<script>
    import reply from './reply'
    export default{
        components:{
            reply,
        },
        data(){return{
            content: this.replies
        }},
        props:['replies'],
        created(){
            this.listen()
        },
        methods:{
            listen(){
                EventBus.$on('newReply',(reply) => {this.content.unshift(reply)})
                EventBus.$on('deleteReply',(index) => {
                    axios.delete(`/api/question/${this.$route.params.slug}/reply/${this.content[index].id}`)
                        .then(res => {this.content.splice(index,1)})
                })
            }
        }

    }
</script>
