<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Danh sách khách hàng</span>
            <router-link to="/customer/add" class="btn btn-primary">Thêm mới</router-link>
    </div>
    </nav>
    
    <div class="panel panel-default">
        <div class="panel-body ">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Email</th>
                        <th scope="col">Giới tính</th>
                        <th scope="col">Công ty</th>
                        <th scope="col">Trạng thái hoạt động</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="cus in customers" :key="cus.id">
                        <td>{{ cus.id }}</td>
                        <td>{{ cus.name }}</td>
                        <td>{{ cus.email }}</td>

                        <td>
                            <span v-if="us.gender === 'Male'" class="Male text-success">Nam</span>
                            <span v-else-if="us.gender === 'Female'" class="Female text-danger">Nữ</span>
                            <span v-else-if="us.gender === 'Other'" class="Other text-danger-emphasis">Khác</span>
                        </td>

                        <td>{{ cus.company }}</td>
                        
                        <td>
                            <span v-if="cus.active_status === 'Active'" class="active text-success">Hoạt động</span>
                            <span v-else class="Inactive text-danger">Ngừng hoạt động</span>
                        </td>
                        
                        <td>
                            <router-link :to="{path: '/customer/edit/' + cus.id}" class="btn btn-info">Sửa</router-link>
                            <button type="button" @click="deleteCustomer(cus.id)" class="btn btn-danger" style="margin-left: 10px;">Xóa</button>
                            
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
    name: 'customer-list',
    data() {
        return {
            customers: []
            
        };
    },
    mounted(){
        this.getCustomers();
    },
    methods:{
        getCustomers(){
            axios.get("/api/customer", {headers: authHeader()}).then(res =>{
                this.customers = res.data;
            });
        },

        deleteCustomer(id){
            if(confirm("Bạn có chắc chắn muốn xóa khách hàng này không?")){
                axios.delete(`/api/customer/delete/${id}`, {headers: authHeader()}).then(response=>{
                    this.getCustomers()
                }).catch(error=>{
                    console.log(error)
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
