<template>
    <show-question :data="question" v-if="question"/>
</template>
<script>
    import ShowQuestion from "./ShowQuestion";
    export default{
        components:{
          ShowQuestion
        },
        data(){return{
            question:null,
        }},
        async created() {
            let {data:{data}} = await axios.get(`/api/question/${this.$route.params.slug} `)
            this.question = data
        }
    }
</script>
