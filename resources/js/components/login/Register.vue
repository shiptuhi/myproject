<template>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-80">
            <div class="row justify-content-center" style="margin:20px;">
                <div class="col-lg-6 col-md-8 register-box">
                    <div class="card shadow-2-strong" style="border-radius: 15px">
                        <div class="p-4 p-md-9 register-box">
                            <h3 class="mt-4 mb-4 pb-2 pb-md-0 mb-md-5 register-title"> <i class="fas fa-lock"></i>Register</h3>
                            <div class="col-lg-12 register-form">
                                <form @submit.prevent="register">

                                    <div class="form-group">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" i>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Phone number</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Gender</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Active Status</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-12 justify-content-center d-flex p ">
                                        <button type="submit" class="btn btn-primary">LOGIN</button>
                                    </div>
                                    <div class="col-12 justify-content-center d-flex p mt-4">
                                        <p class="message">Already registered? <router-link to="/login" class="link" style="margin-left: 20px;">Sign In</router-link></p>
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
export default {
    name: "register",
    data() {
        return {
            users: {
                email: "",
                password: "",
            },
        }

    },
}
</script>
<style>
.register-box {
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
    border-radius: 15px;
}

.register-title {
    text-align: center;
    font-size: 30px;
    letter-spacing: 2px;
    margin-top: 35px;
    font-weight: bold;
    color: #0DB8DE;
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
</style>