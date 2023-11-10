<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Danh sách công việc</span>
        
        <router-link to="/module/add" class="btn btn-danger">Add</router-link>
        <router-link to="/project/edit" class="btn btn-info" style="margin-left: 10px;">Edit</router-link>
    </div>
    </nav>
    
    <div class="panel panel-default">
        <!-- <div class="panel-heading">Project list</div> -->
        <div class="panel-body ">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Mã module</th>
                        <th scope="col">Tên module</th>
                        <th scope="col">Ghi chú</th>
                        <th scope="col">Hành động</th>
                        <!-- <th width="100">&nbsp;</th> -->
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="mod in modules" :key="mod.id">
                        <td>{{ mod.id }}</td>
                        <td>{{ mod.module_code }}</td>
                        <td>{{ mod.name }}</td>
                        <td>{{ mod.note }}</td>
                        <td>
                            <router-link to="/module/add" class="btn btn-danger">Add</router-link>
                            <router-link to="/module/edit" class="btn btn-info" style="margin-left: 10px;">Edit</router-link>
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
