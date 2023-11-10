<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Danh sách đầu mục công việc</span>
            <router-link to="/work-item/add" class="btn btn-primary">Add</router-link>
    </div>
    </nav>
    
    <div class="panel panel-default">
        <!-- <div class="panel-heading">Project list</div> -->
        <div class="panel-body ">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Mã đầu mục</th>
                        <th scope="col">Tên đầu mục</th>
                        <th scope="col">Mã module</th>
                        <th scope="col">Dự án</th>
                        <th scope="col">Người thực hiện</th>
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
                        <td>{{ prj.note }}</td>
                        <td>
                            <router-link to="/project/edit" class="btn btn-info">Edit</router-link>
                            <router-link to="/project/delete" class="btn btn-danger" style="margin-left: 10px;">Delete</router-link>
                            
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import axios from "axios";

// export default {
//     name: 'project-list',
//     data() {
//         return {
//             projects: [],
//         };
//     },
//     mounted(){
//         this.getProjects();
//     },
//     methods:{
//         getProjects(){
//             axios.get("http://127.0.0.1:8080/api/project").then(response => {
//             this.projects = response.data;
//         });
//         }
//     }
// };
</script>
