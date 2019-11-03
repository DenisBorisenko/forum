<template>
    <div>
        <reply
            v-for="reply in content"
            :key="reply.id"
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
            }
        }

    }
</script>
