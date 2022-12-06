<?php
require_once("../db_connect.php");

$userid = $_SESSION['userid'];
$newPass = $_POST['newPass'];
$btnClicked = $_POST['changePassnew'];

if(isset($_POST['changePassnew']) && isset($_POST['newPass'])){
    
  $q = mysqli_query($conn, "select password from users where userID =$userid");
  if($rows=mysqli_fetch_assoc($q)){
    $oldPass = $rows['password'];
  }
   
    
    if($_POST['newPass'] == $oldPass){
        ?><script>alert("New Password Cannot be The same as the old one");</script><?php
        // header("location: ../profile.php");
    }
    
    else{
        $q = "Update users set password=$newPass where userID =$userid";
        $qUpdatePass = mysqli_query($conn, $q);
        if($qUpdatePass){
            header("location: ../profile.php");
        }
    }

}
else{
    echo "button not set";
    
}
?>

