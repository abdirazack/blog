<?php
    require_once '../db_connect.php'; 

    $userid = $_SESSION['userid'];
    $postID = $_SESSION['currentPost'];

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

?>