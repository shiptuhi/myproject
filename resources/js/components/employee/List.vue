<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Danh sách nhân viên</span>
            <router-link to="/project/add" class="btn btn-primary">Add</router-link>
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
                        <th scope="col">Hành động</th>
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
                        
                        <td>
                            <router-link :to= "{path: '/employee/edit/' + us.id}" class="btn btn-info">Edit</router-link>
                            <button type="button" @click="deleteEmployee(us.id)" class="btn btn-danger" style="margin-left: 10px;">Delete</button>
                            
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
    name: 'employee-list',
    data() {
        return {
            users: []
            
        };
    },
    mounted(){
        this.getUsers();
    },
    methods:{
        // getUsers(){
        //     const token = localStorage.getItem('token');
        //     console.log(token)
        //     // const headers = axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
        //     // console.log(this.users);
        //     const headers = { 'Authorization': `Bearer ${token}` };
        //     axios.get("/api/auth/user-list", { headers }).then(res => {
        //         this.users = res.data;
        //         console.log('Token:', token);
        //         console.log('API Response:', res.data);
        //         console.log('Users:', this.users);
                
        //     }).catch(error => {
        //         console.error('Error fetching user list:', error);
        //     });
        // },

        getUsers(){
            console.log(this.users);
            axios.get("/api/list").then(res =>{
                console.log(this.users);
                this.users = res.data;
            });
        },

        deleteEmployee(id){
            if(confirm("Bạn có chắc chắn muốn xóa nhân viên này không?")){
                axios.delete(`/api/employee/delete/${id}`).then(response=>{
                    this.getUsers()
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
<style>
/* span {
    color: rgba(237, 28, 36, 1);
} */
</style>
