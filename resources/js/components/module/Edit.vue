<template>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div
                        class="card shadow-2-strong"
                        style="border-radius: 15px"
                    >
                        <div class="p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">
                                THÊM MODULE
                            </h3>
                            <form @submit.prevent="addModule">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="module_code">Mã module: <span>*</span></label>
                                            <input required type="text" placeholder="Nhập mã module" class='form-control form-control-lg' v-model="modules.module_code"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="date_start">Ngày bắt đầu :</label>
                                            <input type="text" placeholder="yyyy-mm-dd" class="form-control form-control-lg" id='date_start' v-model="modules.date_start"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Tên module: <span>*</span></label>
                                            <input required type="text" placeholder="Nhập tên module" class="form-control form-control-lg" id='name' v-model="modules.name"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="project_id">Mã dự án :</label>
                                            <select class="form-control form-control-lg" v-model="modules.project_id">
                                                <option value="">--Chọn--</option>
                                                <option v-for="prj in project_module" :value="prj.id">{{prj.project_code}}</option>
                                                
                                            </select>
                                            <!-- <input type="text" class="form-control form-control-lg" id='date_end' v-model="modules.project_id"/> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="user_id">Người phụ trách</label>
                                            <select class="form-control form-control-lg" v-model="modules.user_module">
                                                <option value="">--Chọn--</option>
                                                <option v-for="user in user_module" :value="user.id">{{ user.name}}</option>  
                                            </select>
                                            <!-- <input required type="text" placeholder="Nhập tên người phụ trách" class="form-control form-control-lg" id="user_id" v-model="modules.user_module"/> -->
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="note">Ghi chú</label>
                                            <input type="note" class="form-control form-control-lg" v-model="modules.note"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <router-link to="/module/list" class="btn btn-warning" style="margin-left: 30px;">Return</router-link>
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
import axios from "axios";

export default {
    name: 'module-edit',
    data() {
        return {
            modules: {
                'module_code': "",
                'name': "", 
                'note':"",
                'date_start':"",
                'project_id':[],
                'user_module': [],

            },
            project_module:[],
            user_module:[]
        };
    },
    mounted(){
        this.getProjectList();
        this.getUserList();
        this.showModule();
        console.log(this.$route.params.id);
    },
    methods:{
        getProjectList(){
            axios.get("/api/project").then(response => {
                this.project_module = response.data;
            });
        },
        getUserList(){
            axios.get("/api/list").then(response => {
                this.user_module = response.data;
            });
        },

        showModule(){
            const id = this.$route.params.id;
            axios.get(`/api/module/update/${id}`).then(response => {
                this.modules = response.data;
            })
        },

        updateModule(){
            // console.log(this.modules);
            axios.post("/api/module/create", this.modules).then(response => {
            this.$router.push('/module/list');
        }).catch(error => {
                console.error('Error:', error);
            });
        }
    }
};




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
