<template>
  <div id="app" s>
    <Navbar v-if="showNavbar"/>
    <div style="display: flex;">
      <Sidebar v-if="showSidebar"/>
      <div class="main-content">
        <router-view />
      </div>
    </div>
  </div>
</template>
<script>
import Navbar from './navbar/navbar.vue';
import Sidebar from './sidebar/sidebar.vue';
export default {
  
    name: 'App', 
    components:{
      Navbar, 
      Sidebar
    },
    computed: {
      showNavbar(){
        return this.$route.path != '/login' && this.$route.path != '/register';
      },
      showSidebar(){
        return this.$route.path != '/login' && this.$route.path != '/register';
      }
    },
  }
</script>
<style>
.main-content {
  flex: 1;
  padding: 10px;
}
</style>