<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Danh sách dự án</span>
        <form class="d-flex" role="search">
              <input class="form-control mb-6" type="search" placeholder="Search" aria-label="Search" @input="filter" v-model="input">
              <button class="btn btn-outline-success" @click.prevent="filter">Search</button>
        </form>
        <router-link to="/project/add" class="btn btn-primary">Thêm mới</router-link>
    </div>
    </nav>
    
    <div class="panel panel-default">
        <!-- <div class="panel-heading">Project list</div> -->
        <div class="panel-body ">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã dự án</th>
                        <th scope="col">Tên Dự án</th>
                        <th scope="col">Ngày bắt đầu</th>
                        <th scope="col">Người phụ trách</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Hành động</th>
                        <!-- <th width="100">&nbsp;</th> -->
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(prj,idx) in projects" :key="idx">
                        <td>{{ idx+1 }}</td>
                        <td>{{ prj.project_code }}</td>
                        <td>{{ prj.name }}</td>
                        <td>{{ prj.date_start }}</td>
                        <td >{{ prj.users.name  }}</td>
                        <td><span v-if="prj.active_status === 'Active'" class="active text-success">Hoạt động</span>
                        <span v-else class="Inactive text-danger">Ngừng hoạt động</span></td>
                        <!-- <td>{{ prj.active_status }}</td> -->
                        
                        <td>
                            <router-link :to="{path: '/project/edit/' + prj.id}" class="btn btn-info">Sửa</router-link>
                            <button type="button" @click="deleteProject(prj.id)" class="btn btn-danger" style="margin-left: 10px;">Xóa</button>
                            
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import authHeader from '/var/www/html/myproject/myproject/resources/js/auth-header.js';
import axios from 'axios';
export default {
    name: 'project-list',
    data() {
        return {
            projects: [],
            input: '',
            
            
        };
    },
    mounted(){
        this.getProjects();
        // this.filter();
    },
    methods:{
        getProjects(){
            // const header = localStorage.getItem('token');
            // console.log(header);
            // console.log(authHeader());
            axios.get("/api/project", {headers: authHeader()}).then(response => {
                // console.log(response.data);
                this.projects = response.data;
            });
        },

        deleteProject(id){
            if(confirm("Bạn có chắc chắn muốn xóa dự án không?")){
                axios.delete(`/api/project/delete/${id}`, {headers: authHeader()}).then(response=>{
                    this.getProjects();
                    alert('Xóa dự án thành công');
                }).catch(error=>{
                    if(error = '403'){
                        alert('Không đủ thẩm quyền');
                    }
                })
            }
        },
        filter() {
            const params = {
                input: this.input
            }
            axios.get("/api/project/search/", {params, headers: authHeader()}).then(response=>{
                // console.log(params);
                this.projects = response.data;
            }).catch(error =>  {
                console.error(error);
            });
        },
    }
    // const getProjects = async()=>{
    //     try {
    //         const res = await axios.get("http://127.0.0.1:8080/api/project");
    //         this.projects = res.data;
    //     } catch (error) {
    //         console.error(error);
    //     }
    // };
    // getProjects();
}
</script>
<style>
/* span {
    color: rgba(237, 28, 36, 1);
} */
</style>
