<template>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong" style="border-radius: 15px">
                        <div class="p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">
                                THÊM ĐẦU MỤC
                            </h3>
                            <form @submit.prevent="addWorkItem">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="work_item_code">Mã đầu mục : <span>*</span></label>
                                            <input required type="text" placeholder="Nhập mã đầu mục" class='form-control form-control-lg' v-model="work_items.work_item_code"/>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="module_id">Module : </label>
                                            <select class="form-control form-control-lg" v-model="work_items.module_id">
                                                <option value="">--Chọn--</option>
                                                <option v-for="mod in module_work_items" :key="mod.id">{{ mod.module_code }}</option>  
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Tên đầu mục : <span>*</span></label>
                                            <input required type="text" placeholder="Nhập tên đầu mục" class="form-control form-control-lg" v-model="work_items.name"/>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="user_id">Người phụ trách : </label>
                                            <select class="form-control form-control-lg" v-model="work_items.emp_workitem">
                                                <option value="" default>--Chọn--</option>
                                                <option v-for="user in user_work_items" :key="user.id">{{ user.name}}</option>  
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="project_id">Dự án :</label>
                                            <select class="form-control form-control-lg" id="project_id" v-model="work_items.project_id" @change="getModuleList">
                                                <option value="">--Chọn--</option>
                                                <option v-for="prj in project_work_items" :key="prj.id">{{prj.project_code}}</option>
                                                
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="note">Ghi chú : </label>
                                            <input type="note" class="form-control form-control-lg" v-model="work_items.note"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="date_start">Ngày bắt đầu :</label>
                                            <input type="text" placeholder="dd-mm-yyyy" class="form-control form-control-lg" id='date_start' v-model="work_items.date_start"/>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="date_start">Ngày kết thúc :</label>
                                            <input type="text" placeholder="dd-mm-yyyy" class="form-control form-control-lg" id='date_start' v-model="work_items.date_end"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="status" class="form-label">Mức độ ưu tiên : <span>*</span></label>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="status"
                                                            id="priority"
                                                            value="Emergency"
                                                            formControlName="status"
                                                            v-model="work_items.priority"
                                                        />
                                                        <label class="form-check-label" for="priority">Khẩn Cấp</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="status"
                                                            id="priority"
                                                            value="High"
                                                            formControlName="status"
                                                            v-model="work_items.priority"
                                                        />
                                                        <label class="form-check-label" for="priority">Cao</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="status"
                                                            id="priority"
                                                            value="Medium"
                                                            formControlName="status"
                                                            v-model="work_items.priority"
                                                        />
                                                        <label class="form-check-label" for="priority">Trung Bình</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="status"
                                                            id="priority"
                                                            value="Low"
                                                            formControlName="status"
                                                            v-model="work_items.priority"
                                                        />
                                                        <label Class="form-check-label" for="priority">Thấp</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
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
import authHeader from '/var/www/html/myproject/myproject/resources/js/auth-header.js';
export default {
    name: 'work-item-add',
    data() {
        return {
            work_items: {
                'work_item_code': "",
                'name': "", 
                'module_id': [],
                'project_id': [],
                'priority': "",
                'emp_workitem': [],
                'date_start':"",
                'date_end':"", 
                'note': "",
            },
            module_work_items: [],
            project_work_items: [],
            user_work_items: [],
        };
    },
    mounted(){
        this.getProjectList();
        this.getModuleList();
        this.getUserList();

        // this.showModule();
        // this.addWorkItem();
        // console.log(this.$route.params.id);
    },
    methods:{
        getProjectList(){
            axios.get("/api/project", {headers: authHeader()}).then(response => {
                this.project_work_items = response.data;
            });
        },

        getModuleList(){
            axios.get(`/api/get-modules-by-project/${this.work_items.project_id}`, {headers: authHeader()}).then(response => {
                this.module_work_items = response.data;
            });
        },
        
        getUserList(){
            axios.get("/api/list").then(response => {
                this.user_work_items = response.data;
            });
        },
        addWorkItem(event){
            event.preventDefault();
            // console.log(this.work_items);
            axios.post("/api/work_item/create", this.work_items, {headers: authHeader()}).then(response => {
                // console.log(this.work_items);
                this.$router.push('/work-item/list');
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
