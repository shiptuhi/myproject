<template>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-11">
                    <div class="card shadow-2-strong form-add" style="border-radius: 15px">
                        <div class="p-4 p-md-9">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">
                                THÊM MỚI DỰ ÁN
                            </h3>
                            <form @submit.prevent="addProject">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="project_code">Mã dự án: <span>*</span></label>
                                            <input required type="text" placeholder="Nhập mã dự án" class='form-control form-control-lg' id='project_code' v-model='projects.project_code'/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="date_start">Ngày bắt đầu :</label>
                                            <input type="text" placeholder="dd-mm-yyyy" class="form-control form-control-lg" id='date_start' v-model="projects.date_start"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Tên dự án: <span>*</span></label>
                                            <input required type="text" placeholder="Nhập tên dự án" class="form-control form-control-lg" id='name' v-model="projects.name"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="date_end">Ngày kết thúc :</label>
                                            <input type="text" placeholder="dd-mm-yyyy" class="form-control form-control-lg" id='date_end' v-model="projects.date_end"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="user_id">Người phụ trách</label>
                                            <select class="form-control form-control-lg" v-model="projects.user_id">
                                                <option value="">--Chọn--</option>
                                                <option v-for="user in user_project" :value="user.id">{{ user.name}}</option>
                                            </select>
                                            <!-- <input required type="text" class="form-control form-control-lg" id="user_id" v-model="projects.user_id"/> -->
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-6">
                                        <div class="form-group">
                                            <label for="status" class="form-label">Trạng thái: <span>*</span></label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="status"
                                                            id="active_status"
                                                            value="Active"
                                                            formControlName="status"
                                                            v-model="projects.active_status"
                                                        />
                                                        <label class="form-check-label" for="active_status"> Hoạt động</label>
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input
                                                        class="form-check-input"
                                                        type="radio"
                                                        name="status"
                                                        id="active_status"
                                                        value="Inactive"
                                                        formControlName="status"
                                                        v-model="projects.active_status"
                                                    />
                                                    <label Class="form-check-label" for="active_status">Ngừng hoạt động</label>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="note">Ghi chú</label>
                                            <input type="note" class="form-control form-control-lg" id="note" v-model="projects.note"/>
                                        </div>
                                    </div>
                                </div>
                                <br />

                                <div class="col-12 justify-content-center d-flex p ">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <router-link to="/project/list" class="btn btn-warning" style="margin-left: 30px;">Return</router-link>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import authHeader from '/var/www/html/myproject/myproject/resources/js/auth-header.js';
import axios from "axios";
export default {
    name: "project-add",
    data() {
        return {
            projects: {
                project_code: "",
                name: "",
                active_status: "",
                date_start: "",
                date_end: "",
                user_id: [],
                note: "",
            },
            user_project: [],
        }
        
    },
    mounted(){
        this.getUserList();
    },
    methods:{
        getUserList(){
            axios.get("/api/list", {headers: authHeader()}).then(response => {
                this.user_project = response.data;
            });
        },
        addProject(event){
            event.preventDefault();
            // console.log(this.projects);
            axios.post("/api/project/create", this.projects, {headers: authHeader()}).then(response => {
                alert('Thêm dự án thành công');
                this.$router.push('/project/list');
            }).catch(error => {
                if(error = '403'){
                    alert('Không đủ thẩm quyền');
                } else{
                    alert('Thêm dự án thất bại');
                }
            });
        }
        // async create(){
        //     await this.axios.post('/api/project/create',this.projects).then(response=>{
        //         this.$router.push({name:"project-list"})
        //     }).catch(error=>{
        //         console.log(error)
        //     })
        // }
    },
}

</script>

<style>
.gradient-custom {
    background: #f093fb;
    background: -webkit-linear-gradient(
        to bottom right,
        rgb(147, 171, 251),
        rgb(87, 187, 245)
    );
    background: linear-gradient(
        to bottom right,
        rgb(149, 147, 251),
        rgb(87, 208, 245)
    );
}
</style>
