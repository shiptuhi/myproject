<template>
    <section class="vh-200 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong" style="border-radius: 15px">
                        <div class="p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">
                                THÊM CÔNG VIỆC
                            </h3>
                            <form @submit.prevent="addWorkDo">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="work_do_code">Mã công việc : <span>*</span></label>
                                            <input required type="text" class='form-control form-control-lg' v-model="work_does.work_do_code"/>
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="work_item_id">Thuộc đầu mục:</label>
                                            <select class="form-control form-control-lg" id="work_item_id" v-model="work_does.work_item_id">
                                                <option value="">--Chọn--</option>
                                                <option v-for="wi in wItem_work_does" :value="wi.id">{{wi.work_item_code}}</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Tên công việc : <span>*</span></label>
                                            <input required type="text" class="form-control form-control-lg" v-model="work_does.name"/>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="emp_workdo">Người thực hiện : </label>
                                            <select class="form-control form-control-lg" v-model="work_does.emp_workdo">
                                                <option value="">--Chọn--</option>
                                                <option v-for="user in user_work_does" :value="user.id">{{ user.name}}</option>  
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">

                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="project_id">Dự án :</label>
                                            <select class="form-control form-control-lg" id="project_id" v-model="work_does.project_id">
                                                <option value="">--Chọn--</option>
                                                <option v-for="prj in project_work_does" :value="prj.id">{{prj.project_code}}</option>
                                                
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="note">Ghi chú : </label>
                                            <input type="note" class="form-control form-control-lg" v-model="work_does.note"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="module_id">Thuộc module : </label>
                                            <select class="form-control form-control-lg" v-model="work_does.module_id">
                                                <option value="">--Chọn--</option>
                                                <option v-for="mod in module_work_does" :value="mod.id">{{ mod.module_code }}</option>  
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="type_of_work" class="form-label">Loại công việc : <span>*</span></label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="type_of_work"
                                                            id="type_of_work"
                                                            value="Complex"
                                                            formControlName="type_of_work"
                                                            v-model="work_does.type_of_work"
                                                        />
                                                        <label class="form-check-label" for="type_of_work">Phức tạp</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="type_of_work"
                                                            id="type_of_work"
                                                            value="Simple"
                                                            formControlName="type_of_work"
                                                            v-model="work_does.type_of_work"
                                                        />
                                                        <label Class="form-check-label" for="priority">Đơn giản</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="priority" class="form-label">Mức độ ưu tiên : <span>*</span></label>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="priority"
                                                            id="priority"
                                                            value="Emergency"
                                                            formControlName="priority"
                                                            v-model="work_does.priority"
                                                        />
                                                        <label class="form-check-label" for="priority"> Khẩn Cấp</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="priority"
                                                            id="priority"
                                                            value="High"
                                                            formControlName="priority"
                                                            v-model="work_does.priority"
                                                        />
                                                        <label Class="form-check-label" for="priority">Cao</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="priority"
                                                            id="priority"
                                                            value="Medium"
                                                            formControlName="priority"
                                                            v-model="work_does.priority"
                                                        />
                                                        <label class="form-check-label" for="priority">Trung Bình</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="priority"
                                                            id="priority"
                                                            value="Low"
                                                            formControlName="priority"
                                                            v-model="work_does.priority"
                                                        />
                                                        <label Class="form-check-label" for="priority">Thấp</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="status" class="form-label">Trạng thái : <span>*</span></label>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="status"
                                                            id="status"
                                                            value="Finish"
                                                            formControlName="status"
                                                            v-model="work_does.status"
                                                        />
                                                        <label class="form-check-label" for="status">Hoàn thành</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="status"
                                                            id="status"
                                                            value="Processing"
                                                            formControlName="status"
                                                            v-model="work_does.status"
                                                        />
                                                        <label Class="form-check-label" for="status">Đang làm</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="status"
                                                            id="status"
                                                            value="Tạm dừng"
                                                            formControlName="status"
                                                            v-model="work_does.status"
                                                        />
                                                        <label class="form-check-label" for="status">Tạm dừng</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="status"
                                                            id="status"
                                                            value="Cancel"
                                                            formControlName="status"
                                                            v-model="work_does.status"
                                                        />
                                                        <label Class="form-check-label" for="status">Hủy bỏ</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <router-link to="/work-do/list" class="btn btn-warning" style="margin-left: 30px;">Return</router-link>
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
    name: 'work-do-add',
    data() {
        return {
            work_does: {
                'work_do_code': "",
                'name': "", 
                'module_id': [],
                'work_item_id': [],
                'project_id': [],
                'type_of_work': "",
                'priority': "",
                'emp_workdo': [],
                'status': "",
                'note': "",
            },
            wItem_work_does:[],
            module_work_does: [],
            project_work_does: [],
            user_work_does: [],
        };
    },
    mounted(){
        this.getWorkItemList();
        this.getModuleList();
        this.getProjectList();
        this.getUserList();
    },
    methods:{
        getWorkItemList(){
            axios.get("/api/work_item").then(response => {
                this.wItem_work_does = response.data;
            });
        },
        getModuleList(){
            axios.get("/api/module").then(response => {
                this.module_work_does = response.data;
            });
        },

        // getModuleList(){
        //     axios.get(`/api/get-modules-by-project/${this.work_items.project_id}`).then(response => {
        //         this.module_work_does = response.data;
        //     });
        // },

        getProjectList(){
            axios.get("/api/project").then(response => {
                this.project_work_does = response.data;
            });
        },
        getUserList(){
            axios.get("/api/list").then(response => {
                this.user_work_does = response.data;
            });
        },
        addWorkDo(event){
            event.preventDefault();
            // console.log(this.work_does);
            axios.post("/api/work_do/create", this.work_does).then(response => {
                alert('Successfully created');
                // console.log(this.work_does);
                this.$router.push('/work-do/list');
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
span {
    color: rgba(237, 28, 36, 1);

}
</style>
