<?php 
    require_once '../db_connect.php';
    if(isset($_POST['updateView'])){
        $post = $_SESSION['currentPost'];
        $viewCount = 1;

        $updateViewCount = mysqli_query($conn,"UPDATE posts SET  viewCount += '$viewConut'  where  postID = $post");

        
    }
    else{

    }
?>