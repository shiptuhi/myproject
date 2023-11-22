<template>
    <section class="vh-110 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong form-add" style="border-radius: 15px">
                        <div class="p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">
                                THÊM MỚI NHÂN VIÊN
                            </h3>
                            <form @submit.prevent="register">
                                <div class="form-group">
                                        <label class="form-label" for="name" >Họ và tên: <span>*</span></label>
                                        <input
                                            required
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            v-model="users.name"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="username">Tên đăng nhập: <span>*</span></label>
                                        <input
                                            required
                                            type="text"
                                            class="form-control"
                                            id="username"
                                            v-model="users.username"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email: <span>*</span></label>
                                        <input
                                            required
                                            type="text"
                                            class="form-control"
                                            id="email"
                                            v-model="users.email"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="password">Mật khẩu: <span>*</span></label>
                                        <input
                                            required
                                            type="password"
                                            class="form-control"
                                            id="password"
                                            v-model="users.password"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="password_confirmation">Xác nhận mật khẩu: <span>*</span></label>
                                        <input
                                            required
                                            type="password"
                                            class="form-control"
                                            id="password_confirmation"
                                            v-model="users.password_confirmation"
                                        />
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-group">
                                                <label class="form-label" for="phoneNumber">Số điện thoại: <span>*</span></label>
                                                <input
                                                    required
                                                    type="text"
                                                    class="form-control"
                                                    id="phoneNumber"
                                                    v-model="users.phoneNumber"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-group">
                                                <label class="form-label" for="role">Chức vụ: <span>*</span></label>
                                                <select class="form-control form-control-lg" v-model="users.roles">
                                                    <option value="">--Chọn--</option>
                                                    <option v-for="rol in user_role" :key="rol.id">{{rol}}</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label for="gender" class="form-label">Giới tính: <span>*</span></label>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="gender"
                                                            id="gender"
                                                            value="Male"
                                                            formControlName="gender"
                                                            v-model="users.gender"
                                                        />
                                                        <label class="form-check-label" for="gender">Nam</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="gender"
                                                            id="gender"
                                                            value="Female"
                                                            formControlName="gender"
                                                            v-model="users.active_status"
                                                        />
                                                        <label class="form-check-label" for="gender" >Nữ</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="gender"
                                                            id="gender"
                                                            value="Other"
                                                            formControlName="gender"
                                                            v-model="users.gender"
                                                        />
                                                        <label class="form-check-label" for="gender">Khác</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label for="status" class="form-label">Trạng thái hoạt động: <span>*</span></label>
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
                                                            v-model="users.active_status"
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
                                                            v-model="users.active_status"
                                                        />
                                                        <label class="form-check-label" for="active_status">Không hoạt động</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            <router-link to="/emmployee/list" class="btn btn-warning" style="margin-left: 30px;">Return</router-link>
                                        </div>
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
    name: "employee-add",
    data() {
        return {
            users: {
                name: "",
                email: "",
                username: "",
                password: "",
                password_confirmation: "",
                gender: "",
                phoneNumber:"",
                active_status:"",
                roles: [],

            },
            user_role:[]    
        };
    },
    mounted(){
        this.getRole();
    },
    methods: {
        getRole(){
            axios.get("/api/roles").then(response => {
                // console.log(response.data);
                this.user_role = response.data;
            });
        },
        register(event) {
            event.preventDefault();
            axios.post("/api/auth/register", this.users).then((response) => {
                alert("Đăng ký thành công!!!");
                this.$router.push("/login");
            }).catch((error) => {
                alert("Đăng ký thất bại");
            });
        },
    },
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
