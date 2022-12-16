
<?php include_once('header.php');?>

<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4" method="POST" enctype="multipart/form-data" action ='./user_process/insert.php'>
                    <div id="error" style="color: red; font-size: 24px;"></div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c">User Name</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user fa-lg me-3 fa-fw"></i></span>
                            <input type="text" id="username" name="username" class="form-control shadow-none" aria-describedby="basic-addon1" />
                        </div>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c">Email</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope fa-lg me-3 fa-fw"></i></span>
                            <input type="email" id="email" name="email" class="form-control shadow-none" aria-describedby="basic-addon1" />
                        </div>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c">Password</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock fa-lg me-3 fa-fw"></i></span>
                            <input type="password" id="password" name="password" class="form-control shadow-none" aria-describedby="basic-addon1" />
                        </div>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c">Confirm Password</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-key fa-lg me-3 fa-fw"></i></span>
                            <input type="password" id="R-password" onchange='confirmpass()' name="R-password" class="form-control shadow-none" aria-describedby="basic-addon1" />
                        </div>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c">Choose An Avatar</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-image fa-lg me-3 fa-fw"></i></span>
                            <input type="file" id="avatar" name="avatar" class="form-control shadow-none" aria-describedby="basic-addon1" />
                        </div>
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="TOS.php">Terms of service</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <input type="submit" name= 'btnReg' id="btnReg"  class="btn btn-outline-primary btn-lg" value="Register" />
                  </div>
                  <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="./login.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="./Pictures/Profiles/bp.jpg"
                  class="img-fluid rounded-3" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<script>

    $(document).ready(function(){
        $("#error").addClass("d-none");
    });

    function adduser(){
      var username=$('#username').val();
      var email=$('#email').val();
      var password=$('#password').val();
      var avatar=$('#avatar').val();
      var btnReg=$('#btnReg').val();
      
      $.ajax({
        url:"user_process/insert.php",
        type:'post',
        data:{
        username:username,
        email:email,
        password:password,
        avatar:avatar,
        btnReg:btnReg,
      },
        success:function(data){
            alert(data);
            var obj = jQuery.parseJSON(data);
            if (obj.status == 200) {
               Window.location.assign('home.php');
            }
            if (obj.status == 404) {
                $("#error").removeClass("d-none");
                $("#error").text(obj.message);
            }
             
        }
     });
    }

    function confirmpass(){
        var password=$('#password').val();
        var password2=$('#R-password').val();

        if(!(password === password2)){
            $("#error").removeClass("d-none");
            $("#error").text("Your passwords don't match");
        }
        else{
            $("#error").addClass("d-none");
        }
    }
</script>