<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Danh sách đầu mục công việc</span>
        <form class="d-flex" role="search">
              <input class="form-control mb-6" type="search" placeholder="Search" aria-label="Search" @input="filter" v-model="input">
              <button class="btn btn-outline-success" @click.prevent="filter()">Search</button>
        </form>
            <router-link to="/work-item/add" class="btn btn-primary">Thêm mới</router-link>
    </div>
    </nav>
    
    <div class="panel panel-default">

        <div class="panel-body ">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã đầu mục</th>
                        <th scope="col">Tên đầu mục</th>
                        <th scope="col">Dự án</th>
                        <th scope="col">Module</th>
                        <th scope="col">Người thực hiện</th>
                        <th scope="col">Mức ưu tiên</th>
                        <th scope="col">Hành động</th>
                        <!-- <th width="100">&nbsp;</th> -->
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="wi in work_items" :key="wi.id">
                        <td>{{ wi.id }}</td>
                        <td>{{ wi.work_item_code }}</td>
                        <td>{{ wi.name }}</td>
                        <td>{{ wi.projects.project_code }}</td>
                        <td>{{ wi.modules.module_code }}</td>
                        <td>{{ wi.users.name }}</td>
                        <td>
                            <span v-if="wi.priority === 'Emergency'" class="emergency text-danger-emphasis">Khẩn Cấp</span>
                            <span v-else-if="wi.priority === 'High'" class="high text-danger">Cao</span>
                            <span v-else-if="wi.priority === 'Medium'" class="medium text-info">Trung Bình</span>
                            <span v-else-if="wi.priority === 'Low'" class="low text-success">Thấp</span>
                        </td>

                        <td>
                            <router-link :to="{path: '/work-item/edit/' + wi.id}" class="btn btn-info">Sửa</router-link>
                            <button type="button" @click="$event => deleteWorkItem(wi.id)" class="btn btn-danger" style="margin-left: 10px;">Xóa</button>
                            
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
    name: 'work-item-list',
    data() {
        return {
            work_items: [],
            input: ''
        };
    },
    mounted(){
        this.getWorkItems();
    },
    methods:{
        getWorkItems(){
            axios.get("/api/work_item").then(response => {
            this.work_items = response.data;
            // console.log(response.data);
        });
        },
        deleteWorkItem(id){
            if(confirm("Bạn có chắc chắn muốn xóa đầu mục công việc không?")){
                axios.delete(`/api/work_item/delete/${id}`).then(response => {
                    this.getWorkItems();
                }).catch(error =>{
                    console.log(error);
                })
            }
        },
        filter(){
            const params = {
                input: this.input
            }
            try {
            axios.get("/api/work_item/search", {params}).then(response=>{
                // console.log(params);
                this.work_items=response.data;
            });
            } catch(error){
                console.error(error);
            }
        }
    }
};
</script>
