<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Danh sách công việc</span>
        <form class="d-flex" role="search">
              <input class="form-control mb-6" type="search" placeholder="Search" aria-label="Search" @input="filter" v-model="input">
              <button class="btn btn-outline-success" @click.prevent="filter()">Search</button>
        </form>
        <router-link to="/work-do/add" class="btn btn-primary">Thêm mới</router-link>
    </div>
    </nav>
    
    <div class="panel panel-default">
        <div class="panel-body ">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã công việc</th>
                        <th scope="col">Tên công việc</th>
                        <th scope="col">Thuộc đầu mục</th>
                        <th scope="col">Thuộc module</th>
                        <th scope="col">Dự án</th>
                        <th scope="col">Người thực hiện</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="wd in work_does" :key="wd.id">
                        <td>{{ wd.id }}</td>
                        <td>{{ wd.work_do_code }}</td>
                        <td>{{ wd.name }}</td>
                        <td>{{ wd.work_items.work_item_code }}</td>
                        <td>{{ wd.modules.module_code }}</td>
                        <td>{{ wd.projects.project_code }}</td>
                        <td>{{ wd.users.name}}</td>
                        <td>
                            <span v-if="wd.status === 'Finish'" class="emergency text-success">Hoàn thành</span>
                            <span v-else-if="wd.status === 'Processing'" class="high text-info">Đang làm</span>
                            <span v-else-if="wd.status === 'Pause'" class="medium text-warning">Tạm dừng</span>
                            <span v-else-if="wd.status === 'Cancel'" class="cancel text-danger-emphasis">Hủy bỏ</span>
                        </td>
                        <td>
                            <router-link :to="{path: '/work-do/edit/' + wd.id}" class="btn btn-info">Sửa</router-link>
                            <button type="button" @click="$event => deleteWorkDo(wd.id)" class="btn btn-danger" style="margin-left: 10px;">Xóa</button>
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
    name: 'work-do-list',
    data() {
        return {
            work_does: [],
            input:''
        };
    },
    mounted(){
        this.getWorkDoes();
    },
    methods:{
        getWorkDoes(){
            axios.get("/api/work_do").then(response => {
                this.work_does = response.data;
            });
        },
        deleteWorkDo(id){
            if(confirm("Bạn có chắc chắn muốn xóa công việc không?")){
                axios.delete(`/api/work_do/delete/${id}`).then(response=>{
                    this.getWorkDoes()
                }).catch(error=>{
                    console.log(error)
                })
            }
        },

        filter(){
            const params = {
                input: this.input
            }
            try {
            axios.get("/api/work_do/search", {params}).then(response=>{
                this.work_does=response.data;
            });
            } catch(error){
                console.log(error);
            }
        }

    }
};
</script>
