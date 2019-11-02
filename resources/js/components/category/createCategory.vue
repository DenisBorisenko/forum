<template>
    <v-container>
        <h3>Create new category</h3>
        <v-form @submit.prevent="submit">
            <v-text-field
                v-model="form.name"
                label="Category name"
                type="text"
            ></v-text-field>
<!--            <span class="red&#45;&#45;text" v-if="errors.email">{{errors.email[0]}}</span>-->
            <div class="mt-5">
                <v-btn class="mr-4" type="submit" color="green" v-if="!editSlug">Create</v-btn>
                <v-btn class="mr-4" type="submit" color="teal" v-else>Update</v-btn>
            </div>
        </v-form>

        <v-card class="mt-5">
            <v-toolbar
                dark
            >
                <v-toolbar-title>Category</v-toolbar-title>
            </v-toolbar>
            <v-list dense>
                <v-list-item-group>
                    <div v-for="(category,index) in categories"
                         :key="category.id">
                        <v-list-item>
                            <v-list-item-icon>
                                <v-btn icon small @click="edit(index)">
                                    <v-icon dark >mdi-pencil</v-icon>
                                </v-btn>
                                <v-btn icon small @click="destroy(category.slug,index)" >
                                    <v-icon dark >mdi-delete</v-icon>
                                </v-btn>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title>{{category.name}}</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>

                        <v-divider
                            v-if="index + 1 < categories.length"
                            :key="index"
                        ></v-divider>
                    </div>
                </v-list-item-group>
            </v-list>

        </v-card>
    </v-container>
</template>
<script>
    export default{
        data(){return{
            categories: {},
            form:{name:null,},
            editSlug:null,
        }},
        methods:{
            submit(){
                this.editSlug ? this.update() : this.create()
            },
            update(){
                axios.patch(`/api/category/${this.editSlug}`,this.form)
                    .then((res)=> {
                        this.categories.unshift(res.data)
                        this.form.name = null
                        this.editSlug = null
                    })
            },
            create(){
                axios.post('/api/category/',this.form)
                    .then((res)=> {
                        this.categories.unshift(res.data)
                    })
            },
            destroy(slug,index){
                this.categories.splice(index,1)
                axios.delete(`/api/category/${slug}`)
            },
            edit(index){
                this.form.name = this.categories[index].name
                this.editSlug = this.categories[index].slug
                this.categories.splice(index,1)
            }
        },
        created(){
            axios.get('/api/category')
                .then(({data:{data}}) => {this.categories = data})
        }
    }
</script>
