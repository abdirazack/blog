<?php
    include '../db_connect.php' ; 
    if(isset($_POST['displaysend'])){
        $userid = $_SESSION['userid'];
        $postid = $_SESSION['currentPost'];
            $query=mysqli_query($conn,"SELECT * FROM `favorites` where postID = $postid AND userID = $userid;");
            if(mysqli_num_rows($query)>0){
                $data = ['message'=>'success', 'status'=>200];
                echo json_encode($data);
                return;
            }
            else{
                $data= ['message'=>'error','status'=>404];
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