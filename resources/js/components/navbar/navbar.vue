<template>
    <nav class="navbar">
        <div class="container">
          <notifications position="top right" />
          <div class="nav-item dropdown">
              <button class="btn dropdown-toggle text-light fw-bolder" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img :src="emp" alt="emp" />
                <span class="text-light fw-bolder" style="margin-left: 10px">Nhân viên</span>
              </button>
                <ul class="dropdown-menu">
                  <li><router-link to="/employee/list" class="nav-item nav-link text-center">Nhân viên</router-link></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><router-link to="/customer/list" class="nav-item nav-link text-center">Khách hàng</router-link></li>
                </ul>
          </div>
    
          <div class="nav-item dropdown">
              <button class="btn dropdown-toggle text-light fw-bolder" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img :src="task" alt="task"> 
                <span class="text-light fw-bolder" style="margin-left: 10px">Công việc</span>
              </button>
                <ul class="dropdown-menu">
                  <li><router-link to="/project/list" class="nav-item nav-link text-center" >Danh sách dự án</router-link></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><router-link to="/module/list" class="nav-item nav-link text-center" >Danh sách module</router-link></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><router-link to="/work-item/list" class="nav-item nav-link text-center" >Danh sách đầu mục</router-link></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><router-link to="/work-do/list" class="nav-item nav-link text-center" >Danh sách công việc</router-link></li>
                  <!-- <li><a class="dropdown-item" href="#">Công Việc</a></li> -->
                </ul>
          </div>
          
    
          <!-- <a class="navbar-brand text-light fw-bolder" to="#">TASK MANAGEMENT</a> -->
    
          <router-link to="/dashboard" class="nav-item nav-link text-light fw-bolder">TASK MANAGEMENT</router-link>
          
          <div class="navbar-button">
            <img :src="notice" alt="notification">
            <span class="text-light fw-bolder" style="margin-left: 10px">Thông báo</span>
            <notifications />
        </div>

          <div class="nav-item dropdown ">
            <button class="btn dropdown-toggle-lg" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img :src="email" alt="Email" />
              <span class="text-light fw-bolder" style="margin-left: 10px">Hello, {{ account }}</span>
            </button>
            <!-- <button class="btn btn-outline-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button> -->
              <ul class="dropdown-menu">
                <li><router-link to="/change-password" class="dropdown-item text-center" >Đổi mật khẩu</router-link></li>
                <li><hr class="dropdown-divider"></li>
                <li><span class="dropdown-item text-center" v-on:click="logout">Đăng xuất</span></li>
              </ul>
          </div>
        </div>
      </nav>
</template>
<script>
import axios from 'axios';

import emp from '/var/www/html/myproject/myproject/resources/assets/icon/nav-bar/user.svg';
import task from '/var/www/html/myproject/myproject/resources/assets/icon/nav-bar/task.svg';
import email from '/var/www/html/myproject/myproject/resources/assets/icon/nav-bar/username.svg';

import notice from '/var/www/html/myproject/myproject/resources/assets/icon/nav-bar/notification.svg';

// import emp from 'D:/project/myproject/resources/assets/icon/nav-bar/user.svg';
// import task from 'D:/project/myproject/resources/assets/icon/nav-bar/task.svg';
// import email from 'D:/project/myproject/resources/assets/icon/nav-bar/username.svg';

  export default{
    name: "login",
    data() {
        return {
          account:localStorage.getItem("user-name") || 'None',
          email: email,
          task: task,
          emp: emp,
          notice: notice
        }
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
<style>
.navbar {
  background-color: #624DE3;
  display: flex;
  flex-wrap: inherit;
  align-items: baseline;
  justify-content: space-between;
}
</style>