<template>
  <v-footer
    dark
    padless
  >
    <v-card
      class="flex"
      flat
      tile
    >
      <v-card-title                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             >
        <strong class="subheading">Powered by Denis Borisenko</strong>
        <v-spacer></v-spacer>
        <span>{{ new Date().getFullYear() }} — <strong>Forum</strong></span>
        <v-spacer></v-spacer>

        <v-btn
          v-for="item in items"
          :key="item.icon"
          class="mx-4"
          dark
          icon
        >
        <router-link :to="item.src">
          <v-icon size="24px">{{ item.icon }}</v-icon>
        </router-link>
        </v-btn>
      </v-card-title>
    </v-card>
  </v-footer>
</template>
<script>
    export default {
    data: () => ({
      items: [
          {
              icon:'mdi-vk',
              src:'https://vk.com/goodden1',
          },
          {
              icon:'mdi-github-circle',
              src:'https://github.com/DenisBorisenko',
          },
          {
              icon:'mdi-instagram',
              src:'https://www.instagram.com/9niskas/',
          }
      ],
    }),
  }
</script>


