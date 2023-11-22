<template>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong form-add" style="border-radius: 15px">
                        <div class="p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-2">
                                Đổi mật khẩu
                            </h3>
                            <form @submit.prevent="changePassword">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="old_password">Mật khẩu cũ: <span>*</span></label>
                                            <input required type="password" class='form-control form-control-lg' id='old_password' v-model='users.old_password'/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="new_password">Mật khẩu mới: <span>*</span></label>
                                            <input type="password" class="form-control form-control-lg" id='new_password' v-model="users.new_password"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="new_password_confirmation">Xác nhận mật khẩu: <span>*</span></label>
                                            <input required type="password" class="form-control form-control-lg" id='new_password_confirmation' v-model="users.new_password_confirmation"/>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-12 justify-content-center d-flex p ">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <router-link to="/dashboard" class="btn btn-warning" style="margin-left: 30px;">Return</router-link>
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
import authHeader from '/var/www/html/myproject/myproject/resources/js/auth-header.js';
import axios from "axios";
export default {
    name: "project-add",
    data() {
        return {
            users: {
                old_password: "",
                new_password: "",
                new_password_confirmation: "",
            }
        }
        
    },

    methods: {
        
        changePassword(event){
            event.preventDefault();
            // console.log(this.projects);
            axios.post("/api/auth/change-pass", this.users, {headers: authHeader()}).then(response => {
                alert('Đổi mật khẩu thành công');
                this.$router.push('/project/list');
            }).catch(error => {
                alert('Đổi mật khẩu thất bại');
                });
        }

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
