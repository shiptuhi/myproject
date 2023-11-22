<template>
    <section class="vh-110 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong form-add" style="border-radius: 15px">
                        <div class="p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">
                                THÊM MỚI KHÁCH HÀNG
                            </h3>
                            <form @submit.prevent="addCustomer">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Họ tên khách hàng: <span>*</span></label>
                                            <input required type="text" placeholder="Nhập họ tên" class='form-control form-control-lg' id='name' v-model='customers.name'/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="email">Email :<span>*</span></label>
                                            <input required type="text" class="form-control form-control-lg" id='email' v-model="customers.email"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="username">Tên đăng nhập: <span>*</span></label>
                                            <input required type="text" placeholder="Nhập tên đăng nhập" class="form-control form-control-lg" id='username' v-model="customers.username"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="phoneNumber">Số điện thoại :</label>
                                            <input type="text" class="form-control form-control-lg" id='phoneNumber' v-model="customers.phoneNumber"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="company">Công ty</label>
                                            <input type="text" class="form-control form-control-lg" id='company' v-model="customers.company"/>
                                            <!-- <input required type="text" class="form-control form-control-lg" id="user_id" v-model="projects.user_id"/> -->
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
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
                                                            v-model="customers.gender"
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
                                                            v-model="customers.gender"
                                                        />
                                                        <label Class="form-check-label" for="gender">Nữ</label>
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
                                                            v-model="customers.gender"
                                                        />
                                                        <label Class="form-check-label" for="gender">Khác</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
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
                                                            v-model="customers.active_status"
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
                                                        v-model="customers.active_status"
                                                    />
                                                    <label Class="form-check-label" for="active_status">Ngừng hoạt động</label>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="note">Ghi chú</label>
                                        <input type="note" class="form-control form-control-lg" id="note" v-model="customers.note"/>
                                    </div>
                                </div>

                                <div class="col-12 justify-content-center d-flex p ">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <router-link to="/customer/list" class="btn btn-warning" style="margin-left: 30px;">Return</router-link>
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
    name: "customer-add",
    data() {
        return {
            customers: {
                name: "",
                username: "",
                email: "",
                phoneNumber: "",
                company: "",
                gender: "",
                active_status: "",
                note: "",
            },
        }
        
    },
    methods:{
        addCustomer(event){
            event.preventDefault();
            axios.post("/api/customer/create", this.customers, {headers: authHeader()}).then(response => {
                alert("Thêm mới khách hàng thành công");
                this.$router.push('/customer/list');
            }).catch(error => {
                if(error = '403'){
                    alert('Không đủ thẩm quyền');
                } else{
                    alert('Thêm khách hàng thất bại');
                }
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
