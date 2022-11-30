<?php
  session_start();
  require_once('header.php');
  require_once('db_connect.php');
  if(!isset($_SESSION['username'])){
    header("location: login.php");
  }

  $username = $_SESSION['username'];
  $email = $_SESSION['email'];
  $userProfilePicture = "";

  $q = mysqli_query($conn, "select avatar from users where username = '$username' and email = '$email'");
  if($rows=mysqli_fetch_assoc($q)){
    $userProfilePicture = $rows['avatar'];
  }

?>

<nav class="navbar navbar-expand-lg bg-light shadow p-3 mb-5 bg-body rounded">
<div class="container">
    <a class="navbar-brand" href="#">COWT</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-secondary" id="navbarNavDropdown" >
      <ul class="navbar-nav ms-auto">
        <li class="nav-item px-3">
          <a class="nav-link active " aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link" href="home.php">Create Post</a>
        </li>
        <li class="nav-item dropdown px-3">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="<?php echo $userProfilePicture; ?>" class="rounded-5 mx-auto d-block" alt="Profile picure" height="50px" width="50px">
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="./logout.php">Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


<script>
$(document).ready(function(){
  $(".nav-item").hover(function(){
    $(this).css("border-bottom", "2px solid #10a9e0");
    }, function(){
    $(this).css("border", "0");
  });
});
</script>
