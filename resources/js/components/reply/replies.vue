<template>
    <v-container>
        <reply
            v-for="reply in replies"
            :key="reply.id"
            :data="reply"/>
    </v-container>
</template>
<script>
    import reply from './reply'
    export default{
        components:{
            reply,
        },
        props:['replies']

    }
</script>
