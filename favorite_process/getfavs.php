<?php
    require_once '../db_connect.php' or die(); 
    if(isset($_POST['displaysend'])){
        $userid = $_SESSION['userid'];
        $postid = $_SESSION['currentPost'];
        $count = likeCount();

        $query=mysqli_query($conn,"SELECT * FROM favorites WHERE postid = '$postid' AND userid = '$userid'");
        if(mysqli_num_rows($query)>0){
        
            $data = ['message'=>  $count, 'status'=>200];
            echo json_encode($data);
            return ; 
        }
        else
        {
            $data = ['message'=>'0','status'=>404];
            echo json_encode($data);
            return ;
        }
    }
    else{
        $data = ['message'=>'Button not set', 'status'=>404];
        echo json_encode($data);
        return ;
    }

    function likeCount() {
        $query = mysqli_query($conn,"select count(*) as count from favorites");
        if($query)
        {
            $row = mysqli_fetch_assoc($query);
            $count = $row['count'];
            return $count;
        }
        else
        {
            return 0;
        }
    }
?>