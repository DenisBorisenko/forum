<template>
    <div v-if="question">
        <edit-question
            :data="question"
            v-if="editing"
        ></edit-question>

        <show-question
            :data="question"
            v-if="!editing"
        />
    </div>
</template>
<script>
    import ShowQuestion from "./ShowQuestion";
    import editQuestion from "./editQuestion";
    export default{
        components:{
          ShowQuestion,
          editQuestion
        },
        data(){return{
            question:null,
            editing:false,
        }},
        created() {
            this.listen()
            this.getQuestion()
        },
        methods:{
            listen(){
                EventBus.$on('startEditing',()=>{this.editing = true})
                EventBus.$on('cancelEditing',()=>{this.editing = false})
            },
            getQuestion(){
                axios.get(`/api/question/${this.$route.params.slug} `)
                    .then(({data:{data}}) => {this.question = data})
            }
        }
    }
</script>
