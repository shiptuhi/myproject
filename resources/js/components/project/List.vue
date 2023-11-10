<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Danh sách dự án</span>
            <router-link to="/project/add" class="btn btn-primary">Add</router-link>
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
                    <tr v-for="prj in projects" :key="prj.id">
                        <td>{{ prj.id }}</td>
                        <td>{{ prj.project_code }}</td>
                        <td>{{ prj.name }}</td>
                        <td>{{ prj.date_start }}</td>
                        <td>{{ prj.users.name}}</td>
                        <td>{{ prj.active_status }}</td>
                        
                        <td>
                            <router-link :to= "{path: '/project/edit/' + prj.id}" class="btn btn-info">Edit</router-link>
                            <button type="button" @click="deleteProject(prj.id)" class="btn btn-danger" style="margin-left: 10px;">Delete</button>
                            
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    name: 'project-list',
    data() {
        return {
            projects: [],
            // counter: 1,
            
        };
    },
    mounted(){
        this.getProjects();
    },
    methods:{
        getProjects(){
            axios.get("/api/project").then(response => {
                this.projects = response.data;
            });
        },

        deleteProject(id){
            if(confirm("Bạn có chắc chắn muốn xóa dự án không?")){
                axios.delete(`/api/project/delete/${id}`).then(response=>{
                    this.getProjects()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
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
