<?php 
    require_once '../db_connect.php';

    if(isset($_POST['btnComment'])){

        $postID =  htmlspecialchars($_POST['postid']);
        $userID =  htmlspecialchars($_POST['userid']);
        $commentContent  = htmlspecialchars($_POST['commentContent']);
        $likeCount =  '0';

        if(empty($commentContent)){
            $data = ['message'=>'Type something please...', 'status'=>404];
            echo json_encode($data);
            return ;
        }

       
        $sql = "INSERT INTO comments VALUES('null', '$commentContent', '$postID', '$userID',  '$likeCount' , null, null)";

        $query_insert = mysqli_query($conn, $sql);
        if($query_insert){
            $data = ['message'=>'Success', 'status'=>200];
            echo json_encode($data);
            return ;
        }
        else{
            $data = ['message'=>'Failed to  Post comment', 'status'=>404];
            echo json_encode($data);
            return ;
        }
                  
    }
    else{
        $data = ['message'=>'Button was not set', 'status'=>404];
        echo json_encode($data);
        return ;
    }
?>
