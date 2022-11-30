<?php
  require_once 'db_connect.php';

  $username=$_POST['username'];
  $password=$_POST['password'];

  if(isset($_POST['btnLogin']))
  {
    if(empty($username) || empty($password)){
      
      echo "<h2 style=color:'red'>All Fields are required</h2>";
      include_once("index.html");
    }
    else{

      $query = mysqli_query($conn,"select * from users where username='$username' and password ='$password'");
      $res=mysqli_fetch_array($query);
      
      if(mysqli_num_rows($query)>0){
        session_start();	
          $_SESSION['username'] = $res['username'];
          $_SESSION['email'] = $res['email'];
          $_SESSION['userid'] = $res['userID'];
         header("location: ./home.php");        
      }
      else
      {
        echo "<center><h2 style='color: red;' class='mt-4'>Wrong credientails please Try Again</h2></center>";
        include("login.php");
      }


    }
  }
?>


