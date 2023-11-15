<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Danh sách module</span>
        <form class="d-flex" role="search">
              <input class="form-control mb-6" type="search" placeholder="Search" aria-label="Search" @input="filter" v-model="input">
              <button class="btn btn-outline-success" @click.prevent="filter()">Search</button>
        </form>
            <router-link to="/module/add" class="btn btn-primary">Thêm mới</router-link>
    </div>
    </nav>
    
    <div class="panel panel-default">
        <div class="panel-body ">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã module</th>
                        <th scope="col">Tên module</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Dự án</th>
                        <th scope="col">Người tạo</th>
                        <th scope="col">Hành động</th>
                        <!-- <th width="100">&nbsp;</th> -->
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="mod in modules" :key="mod.id">
                        <td>{{ mod.id }}</td>
                        <td>{{ mod.module_code }}</td>
                        <td>{{ mod.name }}</td>
                        <td>{{ mod.date_start }}</td>
                        <td>{{ mod.projects.project_code }}</td>
                        <td>{{ mod.users.name }}</td>
                        <td>
                            <router-link :to= "{path: '/module/edit/' + mod.id}" class="btn btn-info">Sửa</router-link>
                            <button type="button" @click="$event => deleteModule(mod.id)" class="btn btn-danger" style="margin-left: 10px;">Xóa</button>
                            
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
    name: 'module-list',
    data() {
        return {
            modules: [],
            input:''
        };
    },
    mounted(){
        this.getModules();
    },
    methods:{
        getModules(){
            axios.get("/api/module").then(response => {
            this.modules = response.data;
        });
        },
        deleteModule(id){
            axios.delete(`/api/module/delete/${id}`).then(response => {
                this.getModules();
            }).catch(error=>{
                console.log(error)
            })
        },

        filter(){
            const params = {
                input: this.input 
            }
            try {
                axios.get("/api/module/search", {params}).then(response => {
                    console.log(params);
                    this.modules=response.data;
                });

            } catch(error){
                console.error(error);
            }
        }
    }
};
</script>
