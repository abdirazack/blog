<?php
    require_once '../db_connect.php'; 

    $userid = $_SESSION['userid'];
    $postID = $_SESSION['currentPost'];

    $query=mysqli_query($conn,"SELECT * FROM `favorites` where postID = $postID AND userID = $userid;");
    if(mysqli_num_rows($query)>0){

         $data = ['message'=>'already liked','status'=>404];
        echo json_encode($data);
        return ;
    }
    else
    {
       
        $sql  = "INSERT INTO favorites VALUES('null', '$userid', '$postID', 'null')";
        $q = mysqli_query($conn,$sql);
        if($q)
        {
            $data = ['message'=>'success', 'status' =>200];
            echo json_encode($data);
            return;
        }
        else
        {
            $data = ['message'=>'failed to insert query','status'=>404];
            echo json_encode($data);
            return ;
        }
    }

?>