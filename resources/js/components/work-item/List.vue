<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Danh sách đầu mục công việc</span>
            <router-link to="/work-item/add" class="btn btn-primary">Add</router-link>
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
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Ghi chú</th>
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
                        <td>{{ wi.priority}}</td>
                        <td>{{ wi.note }}</td>
                        <td>
                            <router-link :to = "{path: '/work-item/edit' + wi.id}" class="btn btn-info">Edit</router-link>
                            <button type="button" @click="$event => deleteWorkItem(wi.id)" class="btn btn-danger" style="margin-left: 10px;">Delete</button>
                            
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
            axios.delete(`/api/work_item/delete/${id}`).then(response => {
                this.getWorkItems();
            }).catch(error =>{
                console.log(error);
            })
        }
    }
};
</script>
