<template>
<v-container>
    <form @submit.prevent="create">
        <v-text-field
            v-model="form.title"
            label="Title"
            type="text"
        ></v-text-field>
<!--        <span class="red&#45;&#45;text" v-if="errors.email">{{errors.email[0]}}</span>-->
        <v-autocomplete
            v-model="form.category_id"
            :items="categories"
            label="Category"
            item-text="name"
            item-value="id">
        </v-autocomplete>

        <vue-simplemde v-model="form.body"/>

        <div class="mt-5">
            <v-btn class="mr-4" type="submit" color="green">Create</v-btn>
        </div>
    </form>

</v-container>
</template>
<script>
    export default {
        data(){return{
            categories:[],
            form:{
                title:null,
                category_id:null,
                body:null,
            },
            errors:{},
        }},
        async created(){
            let {data:{data}} = await axios.get('api/category')
            this.categories = data
        },
        methods:{
            create(){
                axios.post('/api/question',this.form)
                    .then(res => {this.$router.push(res.data.path)})
                    .catch(e => {this.errors = e.response.data.errors })
            }
        },
    }

</script>
