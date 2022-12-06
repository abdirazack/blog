<?php
  require_once('db_connect.php');
  if(!isset($_SESSION['username'])){
    header("location: login.php");
  }

  $userid = $_SESSION['userid'];
  $username = $_SESSION['username'];
  $email = $_SESSION['email'];
  $userProfilePicture = "";
  $userOldPass = "";

  $q = mysqli_query($conn, "select avatar,password,username,email from users where userID='$userid'");
  if($rows=mysqli_fetch_assoc($q)){
    $usernamee = $rows['username'];
    $emaill = $rows['email'];;
    $userProfilePicturee = $rows['avatar'];
    $userOldPass = $rows['password'];
  }
  include("navabar.php");
?>

<div class="container mt-5 d-flex justify-content-center ">
    <div class="card card-md w-50 text-center shadow">
        <div class="d-inline  mt-2">
            <div class="card-img "><img class="rounded-circle" style="width: 200px; height: 200px;"
                    src="<?php echo $userProfilePicturee;?>" alt="">
            </div>
            <!--===Edit Profile button==-->
            <button type="button" class="btn m-0 w-50" data-bs-toggle="modal" data-bs-target="#editprof"
                data-whatever="@mdo">Change Profile Picture</button>

        </div>

        <div class="card-body">
            <hr class="">
            <!--======================================Change Username Start=======================================================-->
            <div class="input-group">
                <div class="input-group-append">
                    <input type="text" class="form-control" style="width: 29rem;" placeholder="Username"
                        aria-label="Recipient's username" aria-describedby="basic-addon2"
                        value="<?php echo $usernamee;?>" disabled>
                </div>
                <span class="input-group-text mb-3" id="basic-addon2">
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#changUserM" data-whatever="@mdo"><a
                            class="fas fa-pen align-middle"></a></button>
                </span>
            </div>
            <!--======================================Change Username End=========================================================-->

            <!--======================================Change Email Start==========================================================-->
            <div class="input-group">
                <div class="input-group-append">
                    <input type="email" class="form-control" style="width: 200px;" placeholder="Email" disabled
                        aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?php echo $emaill;?>">
                </div>
                <span class="input-group-text" id="basic-addon2">
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#changEmailM" data-whatever="@mdo"><a
                            class="fas fa-pen align-middle"></a></button>

                </span>
            </div>
            <!--======================================Change Email End============================================================-->
            <hr>
            <!--===Change Pass button==-->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changPassM"
                data-whatever="@mdo">Change Password</button>

        </div>
    </div>
</div>


<!--===============================================Change Password Modal Start========================================-->

<div class="modal fade" id="changPassM" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                <button type="button" class="btn close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./Profile_Process/profpass.php" method="POST">
                    <div id="error" style="color: darkorange;"></div>
                    <div class="form-group">
                        <label>Current Password:</label>

                        <input class="form-control" type="text" disabled id="currPass"
                            value="<?php echo $userOldPass;?>" name="currPass">
                    </div>
                    <div class="form-group">
                        <label>New Password:</label>
                        <input class="form-control" type="text" id="newPass" name="newPass">
                    </div>
                    <div class="form-group">
                        <label >Confirm  Password:</label>
                        <input class="form-control" type="text" id="confirmNewPass" name="confirmNewPass" onkeyup="confirmpass()">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="changePassnew" id="changePassnew" class="btn btn-primary">Save
                    Changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--===============================================Change Password Modal End==========================================-->

<!--===============================================Edit Profile Picture Modal Start==========================================-->

<div class="modal" id="editprof" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./Profile_Process/profproc.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    <label for="newPass" class="col-form-label">Choose Profile Picture:</label>
                    <input type="file" name="avatar" class="form-control form-control-lg" id="avatar" />
                    <!-- <input type="file" id="avatar" name="avatar" class="form-control shadow-none"/> -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="sumbit" id="btnUpdateProf" name="btnUpdateProf" class="btn btn-primary">Save
                        changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--===============================================Edit Profile Picture Modal End============================================-->

<!--===============================================Change Username Modal Start========================================-->

<div class="modal fade" id="changUserM" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Username</h5>
                <button type="button" class="btn close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./Profile_Process/profEmUs.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>New Username:</label>
                        <input class="form-control" type="text" id="txtUserNew" name="txtUserNew">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="UsernewN" id="UsernewN" class="btn btn-primary">Save
                    Changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--===============================================Change Username Modal End==========================================-->
<!--===============================================Change Email Modal Start========================================-->

<div class="modal fade" id="changEmailM" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Email</h5>
                <button type="button" class="btn close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./Profile_Process/profEmUs.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>New Email:</label>
                        <input class="form-control" type="text" id="txtEmailNew" name="txtEmailNew">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="EmailnewN" id="EmailnewN" class="btn btn-primary">Save
                    Changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--===============================================Change Email Modal End==========================================-->

<script>
     $(document).ready(function(){
        $("#error").addClass("d-none");
    });


    function confirmpass(){
        var password=$('#newPass').val();
        var password2=$('#confirmNewPass').val();

        if(!(password === password2)){
            $("#error").removeClass("d-none");
            $("#error").text("Your passwords don't match");
        }
        else{
            $("#error").addClass("d-none");
        }
    }
</script>
