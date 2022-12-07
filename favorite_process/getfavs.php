<?php
    include '../db_connect.php' ; 
    if(isset($_POST['displaysend'])){
        $userid = $_SESSION['userid'];
        $postid = $_SESSION['currentPost'];

        
        $query = mysqli_query($conn,"select count(*) as count from favorites where postID = $postid");
        if(mysqli_num_rows($query)>0)
        {
            $row = mysqli_fetch_assoc($query);
            $count = $row['count'];
            $data = ['message'=> "$count", 'status'=>200];
            echo json_encode($data);
            return;
        }
        else{
            $data = ['message'=> '0','status'=>404];
            echo json_encode($data);
            return;
        }
        
    }
    else{
        $data = ['message'=>'Button not set', 'status'=>404];
        echo json_encode($data);
        return ;
    }

   
?>