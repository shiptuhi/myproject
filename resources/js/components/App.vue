<template>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">

    <div class="nav-item dropdown">
        <button class="btn btn-outline-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Nhân viên</button>
          <ul class="dropdown-menu">
            <li><router-link to="/customer/list" class="nav-item nav-link text-center" >Nhan vien</router-link></li>
            <li><router-link to="/customer/list" class="nav-item nav-link text-center" >Khách hàng</router-link></li>
          </ul>
    </div>

    <div class="nav-item dropdown">
        <button class="btn btn-outline-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Công việc</button>
          <ul class="dropdown-menu">
            <li><router-link to="/project/list" class="nav-item nav-link text-center" >Dự án</router-link></li>
            <li><router-link to="/module/list" class="nav-item nav-link text-center" >Module</router-link></li>
            <li><router-link to="/work-item/list" class="nav-item nav-link text-center" >Đầu Mục</router-link></li>
            <li><router-link to="/wor-do/list" class="nav-item nav-link text-center" >Công việc</router-link></li>
            <!-- <li><a class="dropdown-item" href="#">Công Việc</a></li> -->
          </ul>
    </div>
    
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

    <a class="navbar-brand" to="#">TASK MANAGEMENT</a>

      <router-link to="/" class="nav-item nav-link">Home</router-link>
      <router-link to="/project/list" class="btn btn-outline-success" >Tài khoản</router-link>
  </div>
</nav>
<router-view></router-view>

</template>
<script>
  export default {
    name: 'App'
  }
</script>