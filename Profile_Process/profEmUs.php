
<?php
require_once("../db_connect.php");
$userid = $_SESSION['userid'];

$newUsername = $_POST['txtUserNew'];






$q = mysqli_query($conn, "select username,email from users where userID=$userid");
  if($rows=mysqli_fetch_assoc($q)){
    $oldUsername = $rows['username'];
    $oldUserEmail = $rows['email'];
  }

if (isset($_POST['UsernewN']) && isset($_POST['txtUserNew'])) {

        $q = "Update users set username='$newUsername' where userID=$userid";
        $qUpdateUsername = mysqli_query($conn, $q);
        if($qUpdateUsername){
            header("location: ../profile.php");
        }
    

}

else if (isset($_POST['EmailnewN']) && isset($_POST['txtEmailNew'])) {
    $newEmail = $_POST['txtEmailNew'];
    if($_POST['txtEmailNew'] == $oldUserEmail){
        ?><script>alert("New Email Cannot be The same as the old one");</script><?php
        // header("location: ./profile.php");
    }
    
    else{
        $q = "Update users set email='$newEmail' where userID =$userid";
        $qUpdateEmail = mysqli_query($conn, $q);
        if($qUpdateEmail){
            header("location: ../profile.php");
        }
    }

}
?>