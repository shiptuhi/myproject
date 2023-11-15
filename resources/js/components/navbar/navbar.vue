<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
    
          <div class="nav-item dropdown">
              <button class="btn btn-outline-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Nhân viên</button>
                <ul class="dropdown-menu">
                  <li><router-link to="/employee/list" class="nav-item nav-link text-center" >Nhân viên</router-link></li>
                </ul>
          </div>
    
          <div class="nav-item dropdown">
              <button class="btn btn-outline-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Công việc</button>
                <ul class="dropdown-menu">
                  <li><router-link to="/project/list" class="nav-item nav-link text-center" >Dự án</router-link></li>
                  <li><router-link to="/module/list" class="nav-item nav-link text-center" >Module</router-link></li>
                  <li><router-link to="/work-item/list" class="nav-item nav-link text-center" >Đầu Mục</router-link></li>
                  <li><router-link to="/work-do/list" class="nav-item nav-link text-center" >Công việc</router-link></li>
                  <!-- <li><a class="dropdown-item" href="#">Công Việc</a></li> -->
                </ul>
          </div>
          
    
          <a class="navbar-brand" to="#">TASK MANAGEMENT</a>
    
          <router-link to="/project/list" class="nav-item nav-link">Home</router-link>

          <div class="nav-item dropdown ">
            <button class="btn btn-outline-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
              <ul class="dropdown-menu dropdown-menu-right">
                <li><router-link to="/project/list" class="dropdown-item text-center" >Đổi mật khẩu</router-link></li>
                <li><span class="dropdown-item text-center" v-on:click="logout">Đăng xuất</span></li>
              </ul>
          </div>
        </div>
      </nav>
</template>
<script>
import axios from 'axios';

  export default{
    computed: {
    },
    methods: {
      logout(){
        try{
          // axios.post('/api/auth/logout');
          localStorage.clear();
          this.$router.push('/login');
        }catch(error){
          console.error('Logout failed:', error);
        }
      },
    }
  }


</script>