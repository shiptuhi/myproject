<template>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div
                        class="card shadow-2-strong card-registration"
                        style="border-radius: 15px"
                    >
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5"> CHỈNH SỬA DỰ ÁN</h3>
                            <form @submit.prevent="updateProject">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class = "form-label" for="project_code">Mã dự án: <span>*</span></label>
                                            <input required type="text" placeholder="Nhập mã dự án" class='form-control form-control-lg' v-model='projects.project_code'/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class = "form-label" for="date_start">Ngày bắt đầu :</label>
                                            <input type="text" placeholder="yyyy-mm-dd" class="form-control form-control-lg" v-model="projects.date_start"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class = "form-label" for="name">Tên dự án: <span>*</span></label>
                                            <input required type="text" placeholder="Nhập tên dự án" class="form-control form-control-lg" v-model="projects.name"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class = "form-label" for="date_end">Ngày kết thúc :</label>
                                            <input type="text" placeholder="yyyy-mm-dd" class="form-control form-control-lg" v-model="projects.date_end"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class = "form-label" for="user_id">Người phụ trách</label>
                                            <input required type="text" placeholder="Nhập tên người phụ trách" class="form-control form-control-lg" v-model="projects.user_id"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
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
                                                        checked
                                                        value="Inactive"
                                                        formControlName="status"
                                                        v-model="projects.active_status"
                                                    />
                                                    <label class="form-check-label" for="active_status">Không hoạt động</label>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="note">Ghi chú</label>
                                        <input type="note" class="form-control form-control-lg" v-model="projects.note"/>
                                    </div>
                                </div>

                                <div class="col-12">
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
import axios from 'axios';

export default {
    name: 'project-edit',
    data() {
        return {
            projects: [],
            
            
        };
    },

    mounted(){
        console.log(this.$route.params.id);
        this.showProject();
    },
    methods:{
        showProject(){
            const id = this.$route.params.id;
            axios.get(`/api/project/update/${id}`).then(response => {
                // this.projects=response.data;
                this.projects = response.data;
                // console.log(this.projects);
            });
        },
        updateProject(){
            const id = this.$route.params.id;
            axios.put(`/api/project/update/${id}`).then(response => {
                this.$router.push('/project/list');
            })
        }

    }
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
.card-registration .select-input.form-control[readonly]:not([disabled]) {
    font-size: 1rem;
    line-height: 2.15;
    padding-left: 0.75em;
    padding-right: 0.75em;
}
.card-registration .select-arrow {
    top: 13px;
}
</style>
