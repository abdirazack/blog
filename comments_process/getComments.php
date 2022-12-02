<?php
    require_once("../db_connect.php");
    $postID = $_SESSION['currentPost'];
    if(isset($_POST['displaysend'])){

        $query=mysqli_query($conn,"select * from getcomments where postID = '$postID' order by commentID desc");
        if(mysqli_num_rows($query)>0){
        while($rows=mysqli_fetch_array($query)){
        ?>


                    <div class="card-body shadow w-100">
                        <p><?php echo $rows['commentContent'];?></p>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <img src="<?php echo $rows['avatar'];?>" alt="avatar" width="25" height="25" />
                                <p class="small mb-0 ms-2"><?php echo $rows['username'];?></p>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <p class="small text-muted mb-0">Upvote?</p>
                                <i class="far fa-thumbs-up mx-2 fa-xs text-black" style="margin-top: -0.16rem;"></i>
                                <p class="small text-muted mb-0">3</p>
                            </div>
                        </div>
                    </div>
            <?php
        } 

    }
     else{
        // $data = ['message'=>'', 'status'=>22];
        // echo json_encode($data);
        return ;
    }
}
    else{
        $data = ['message'=>'Button not set', 'status'=>404];
        echo json_encode($data);
        return ;
    }

?>
