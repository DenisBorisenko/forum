<template>
    <v-container fluid grid-list-md>
        <v-layout row wrap>
            <v-flex xs8>
                <question v-for="question in questions" :key="question.path" :question="question"/>
            </v-flex>
            sidebar
        </v-layout>
    </v-container>
</template>
<script>
    import question from './question'
    export default{
        data(){return{
            questions:{},
        }},
        components:{
            question
        },
        async created() {
            let {data:{data}} = await axios.get('/api/question')
            this.questions = data
        }
    }
</script>
