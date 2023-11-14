<template>
  <div id="app">
    <Navbar v-if="showNavbar"/>
    <router-view />
  </div>
</template>
<script>
import Navbar from './navbar/navbar.vue';
export default {
  
    name: 'App', 
    components:{
      Navbar
    },
    computed: {
      showNavbar(){
        return this.$route.path != '/login' && this.$route.path != '/register';
      }
    },
  }
</script>