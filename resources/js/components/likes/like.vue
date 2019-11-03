<template>
<div>
    <v-btn icon @click="likeIt">
        <v-icon color="red">mdi-cards-heart</v-icon>
        <span>{{count}}</span>
    </v-btn>
</div>
</template>
<script>
    export default {
        props:['content'],
        data(){return{
            liked:this.content.liked,
            count: this.content.like_count,
        }},
        methods:{
            likeIt(){
                if(User.loggedIn()){
                    this.liked ? this.decr() : this.incr()
                    this.liked = !this.liked
                }
            },
            incr(){
                this.count++
            },
            decr(){
                this.count--
            },

        }
    }
</script>
