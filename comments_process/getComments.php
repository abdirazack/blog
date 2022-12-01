<?php
    require_once("../db_connect.php");
    $postID = $_SESSION['currentPost'];
    if(isset($_POST['displaysend'])){

        $query=mysqli_query($conn,"select * from comments where postID = '$postID'");
        if(mysqli_num_rows($query)>0){
        while($rows=mysqli_fetch_array($query)){
        ?>


                    <div class="card-body shadow">
                        <p><?php echo $rows['commentContent'];?></p>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(4).webp" alt="avatar" width="25" height="25" />
                                <p class="small mb-0 ms-2">Martha</p>
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
        $data = ['message'=>'No Data found in posts', 'status'=>404];
        echo json_encode($data);
        return ;
    }
}
    else{
        $data = ['message'=>'Button not set', 'status'=>404];
        echo json_encode($data);
        return ;
    }

?>
