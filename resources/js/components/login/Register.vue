<template>
    <section class="vh-80 gradient-custom">
        <div class="container py-5 h-80">
            <div class="row justify-content-center" style="margin: 20px">
                <div class="col-lg-6 col-md-8 register-box">
                    <div class="card shadow-2-strong" style="border-radius: 15px">
                        <div class="p-4 p-md-9 register-box">
                            <h3 class="mt-4 mb-4 pb-2 pb-md-0 mb-md-5 register-title"> <i class="fas fa-lock"></i>Register</h3>
                            <div class="col-lg-12 register-form">
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

                                    <div class="col-12 justify-content-center d-flex p ">
                                        <button type="submit" class="btn btn-primary">SAVE</button>
                                    </div>
                                    <div class="col-12 justify-content-center d-flex p mt-4">
                                        <p class="message">Already registered?<router-link to="/login" class="link" style="margin-left: 20px" >Sign In</router-link></p>
                                    </div>
                                </form>
                            </div>
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
    name: "register",
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
.register-box {
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
    border-radius: 15px;
    margin-top: -20px;
}

.register-title {
    text-align: center;
    font-size: 30px;
    letter-spacing: 2px;
    margin-top: 35px;
    font-weight: bold;
    color: #0db8de;
}

.register-form {
    margin-top: 25px;
    text-align: left;
}

.form-group {
    margin: 30px;
}

.form-group .message {
    margin: 15px 0 0;
    color: #b3b3b3;
    font-size: 15px;
}

.form .message link {
    color: #234666;
    text-decoration: none;
}
span {
    color: rgba(237, 28, 36, 1);
}
</style>
