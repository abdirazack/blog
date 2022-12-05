
<?php

if(isset($_FILES['avatar']) &&  isset($_POST['btnUpdateProf'])){

    require_once("db_connect.php");


    $userid = $_SESSION['userid'];


    $filename =  $_FILES['avatar']["name"];
    $filetopath = "./Pictures/Profiles/". $filename; 
    $temp_name = $_FILES['avatar']["tmp_name"];


    if (file_exists($filetopath)){
                       $data = ['message'=>'A file with the same name already exists.', 'status'=>404];
                       echo json_encode($data);
                       return ;
               }
        else
       {
           if(move_uploaded_file($temp_name , $filetopath))
               {
                       
                       $sqq = "Update users set avatar = '$filetopath' where userID = $userid";
                       $query_insert = mysqli_query($conn, $sqq);
                       if($query_insert)
                       {
                         
                           header("location: ./profile.php");
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
}

else{
    echo "very very very stuuuuuuuuuuupid";
}
?>