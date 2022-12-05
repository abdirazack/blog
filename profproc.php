
<?php

if(isset($_POST['avatar'])){
    $pic = $_POST['avatar'];
require_once("db_connect.php");

?>
<div class="card-img "><img class="rounded-circle" style="width: 200px; height: 200px;"
                    src="<?php echo $pic;?>" alt="">
            </div>
<?php
$username = $_SESSION['username'];
$email = $_SESSION['email'];
// $profileup = $_FILES['formFile'];




$filename =  $_FILES["avatar"]["name"];
$filetopath = "./Pictures/Profiles/". $filename;
$temp_name = $_FILES['formFile']["tmp_name"];

if(isset($_POST["btnUpdateProf"])){
  

    if (file_exists($filetopath)){
                       $data = ['message'=>'A file with the same name already exists.', 'status'=>404];
                       echo json_encode($data);
                       return ;
               }
        else
       {
           if(move_uploaded_file($temp_name , $filetopath))
               {
                       
                       $sqq = "Update users set avatar = '$filetopath'";
                       $query_insert = mysqli_query($conn, $sqq);
                       if($query_insert)
                       {
                           $_SESSION['username'] = $username;
                           $_SESSION['email'] = $email;
                           header("location: ../login.php");
                       }
                       else{
                           $data = ['message'=>'Failed to register database', 'status'=>404];
                           echo json_encode($data);
                           return ;
                       }
               }
               else{
                       $data = ['message'=>'Failed to move file', 'status'=>404];
                       echo json_encode($data);
                       return ;
                   }
                   
       }
}}
else{
    echo "very very very stuuuuuuuuuuupid";
}
?>