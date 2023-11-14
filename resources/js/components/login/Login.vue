<template>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-80">
            <div class="row justify-content-center" style="margin:20px;">
                <div class="col-lg-6 col-md-8 login-box">
                    <div class="card shadow-2-strong" style="border-radius: 15px">
                        <div class="p-4 p-md-9 login-box">
                            <h3 class="mt-4 mb-4 pb-2 pb-md-0 mb-md-5 login-title"> <i class="fas fa-lock"></i>Login</h3>
                            <div class="col-lg-12 login-form">
                                <form @submit.prevent="login">
                                    <div class="form-group">
                                        <input required type="text" placeholder="Email" class='form-control form-control-lg' v-model='users.email' />
                                    </div>

                                    <div class="form-group">
                                        <input required type="password" placeholder="Password" class="form-control form-control-lg" v-model="users.password" />
                                    </div>

                                    <div class="col-12 justify-content-center d-flex p ">
                                        <button type="submit" class="btn btn-primary">LOGIN</button>
                                    </div>
                                    <div class="col-12 justify-content-center d-flex p mt-4 form-link">
                                        <p class="message">Not registered? <router-link to="/register" class="link"
                                                style="margin-left: 20px;">Create an account</router-link></p>
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
    name: "login",
    data() {
        return {
            users: {
                email: "",
                password: "",
            },
        }
    },
    mounted() {
        // this.login();
    },
    methods: {
        login(event) {
            event.preventDefault();
            axios.post('/api/auth/login',this.users).then(response => {
            //    console.log(response.data.access_token); 
               localStorage.setItem('token', response.data.access_token);
               this.$router.push('/project/list');
            }).catch(error => {
                console.error('Error:', error);
            });
        }
    }
}
</script>
<style>
.login-box {
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
    border-radius: 15px;
}

.login-title {
    text-align: center;
    font-size: 30px;
    letter-spacing: 2px;
    margin-top: 35px;
    font-weight: bold;
    color: #0DB8DE;
}

input[type=text] {
    border: none;
    border-bottom: 2px solid #0DB8DE;
    border-top: 0px;
    border-radius: 0px;
    outline: 0;
    margin-bottom: 20px;
    padding-left: 0px;
    font-size: 15px;
    letter-spacing: 1px;
}

input[type=password] {
    border: none;
    border-bottom: 2px solid #0DB8DE;
    border-radius: 0px;
    margin-bottom: 20px;
    padding-left: 0px;
    font-size: 15px;
    letter-spacing: 1px;
}

.form-group {
    margin: 30px;
}

.form-link .message {
    margin: 15px 0 0;
    color: #b3b3b3;
    font-size: 15px;
}

.form-link .message .link {
    color: #234666;
    text-decoration: none;
}

</style>