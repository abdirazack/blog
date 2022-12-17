<?php 
include_once("header.php")

?>
<style>

body{
    margin-top:20px;
    background: #f6f9fc;
}
.account-block {
    padding: 0;
    background-repeat: no-repeat;
    background-size: cover;
    height: 100%;
    position: relative;
}
.account-block .overlay {
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.4);
}
.account-block .account-testimonial {
    text-align: center;
    color: #fff;
    position: absolute;
    margin: 0 auto;
    padding: 0 1.75rem;
    bottom: 3rem;
    left: 0;
    right: 0;
}

.text-theme {
    color: #5369f8 !important;
}

.btn-theme {
    background-color: #5369f8;
    border-color: #5369f8;
    color: #fff;
}
</style>

<div id="main-wrapper" class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="mb-5">
                                    <h3 class="h4 font-weight-bold text-theme">Login</h3>
                                </div>

                                <h6 class="h5 mb-0">Welcome back!</h6>
                                <p class="text-muted mt-2 mb-5">Enter your UserName and password to access.</p>

                                <form action="login_process.php" method="post">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">User Name</label>
                                        <input type="text" id="username" name="username"  class="form-control form-control-lg">
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" id="password" name= "password" class="form-control form-control-lg">
                                    </div>
                                    <button  class="btn btn-outline-primary btn-lg" type="submit" name="btnLogin" id = "btnLogin">Login</button>
                                   
                                </form> <a href="./Forget_Pass.php" class="forgot-link float-right text-primary">Forgot password?</a>
                            </div>
                        </div>

                        <div class="col-lg-6 d-none d-lg-inline-block">
                            <div class="account-block rounded-right">
                            <img src="./Pictures/Profiles/itachi.png" height="560vh" width = "450vw">
                                <div class="overlay rounded-right"></div>
                                <div class="account-testimonial">
                                    <h4 class="text-white mb-4">Welcome to COWT.</h4>
                                    <p class="lead text-white">The most amazing blog on the world wide web Come express yourself.</p>
                                    <p>-StickMan</p>
                                </div>
                            </div>    
                        </div>
                    </div>

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->

            <p class="text-muted text-center mt-3 mb-0">Don't have an account? <a href="./userReg.php" class="text-primary ml-1">register</a></p>

            <!-- end row -->

        </div>
        <!-- end col -->
    </div>
    <!-- Row -->
</div>