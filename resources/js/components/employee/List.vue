<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Danh sách nhân viên</span>
        <router-link to="/employee/add" class="btn btn-primary" v-if="isAdmin" :disabled="!isAdmin">Thêm mới</router-link>
    </div>
    </nav>
    
    <div class="panel panel-default">
        <div class="panel-body ">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên nhân viên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Giới tính</th>
                        <th scope="col">Vai trò</th>
                        <th scope="col">Trạng thái hoạt động</th>
                        <th scope="col" v-if="isAdmin" :disabled="!isAdmin">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="us in users" :key="us.id">
                        <td>{{ us.id }}</td>
                        <td>{{ us.name }}</td>
                        <td>{{ us.email }}</td>

                        <td>
                            <span v-if="us.gender === 'Male'" class="Male text-success">Nam</span>
                            <span v-else-if="us.gender === 'Female'" class="Female text-danger">Nữ</span>
                            <span v-else-if="us.gender === 'Other'" class="Other text-danger-emphasis">Khác</span>
                        </td>

                        <td>
                            <span v-for="role in us.roles" :key="role.id" class="text-black">{{ role.name }}</span>
                        </td>
                        
                        <td>
                            <span v-if="us.active_status === 'Active'" class="active text-success">Hoạt động</span>
                            <span v-else class="Inactive text-danger">Ngừng hoạt động</span>
                        </td>
                        
                        <td v-if="isAdmin" :disabled="!isAdmin">
                            <router-link :to= "{path: '/employee/edit/' + us.id}" class="btn btn-info" >Sửa</router-link>
                            <button type="button" @click="deleteEmployee(us.id)" class="btn btn-danger" style="margin-left: 10px;" >Xóa</button>
                            
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import authHeader from '/var/www/html/myproject/myproject/resources/js/auth-header.js';
export default {
    name: 'employee-list',
    data() {
        return {
            users: [],
            role:localStorage.getItem('role')
            
        };
    },
    mounted(){
        this.getUsers();
    },
    computed:{
        isAdmin(){
            return this.role === 'Admin' ;
        }
    },
    methods:{
        getUsers(){
            axios.get("/api/list").then(res =>{
                this.users = res.data;
            });
        },

        deleteEmployee(id){
            if(confirm("Bạn có chắc chắn muốn xóa nhân viên này không?")){
                axios.delete(`/api/employee/delete/${id}`, {headers: authHeader()}).then(response=>{
                    this.getUsers()
                    alert("Xóa nhân viên thành công")
                }).catch(error=>{
                    if(error = '403'){
                        alert('Không đủ thẩm quyền');
                    } 
                })
            }
        }
    }
}
</script>
<style>
/* span {
    color: rgba(237, 28, 36, 1);
} */
</style>
