<template>
<v-content class="bg">
      <v-container fluid>
          <v-row  align="center" justify="center">
              <v-col cols="6">
                   <div class="text-center">
                        <h1>Forum</h1>
                        <span>Here you can create ask and answer questions.</span>
                        <div class="mt-5">
                            <v-btn dark>Ask question
                                <router-link to="/create">
                                    <v-icon  right>mdi-comment-question-outline</v-icon>
                                </router-link>
                        </v-btn>
                         <v-btn dark>List of questions
                             <router-link to="/forum">
                                <v-icon right>mdi-filter-variant</v-icon>
                             </router-link>
                        </v-btn>
                        </div>
                    </div>
              </v-col>
          </v-row>
      </v-container>
</v-content>
</template>

<script>
export default {

}
</script>

<style scoped>
.bg{
    height:100vh;
    
  background-image: url("https://pixabay.com/ru/images/download/fog-3622519.jpg");
  background-size: cover;
  background-position: center;

}
h1{
    font-size: 6rem;
    text-transform: uppercase
}
span{
    font-size: 2.3rem;
}
</style>