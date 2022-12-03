<?php include_once("navabar.php");
    include("db_connect.php");
    include("functions.php");

    $viewCount = 1;
    $posid = $_GET['pid'];
    $_SESSION['currentPost'] = $posid;


    $updateViewCount = mysqli_query($conn,"UPDATE posts SET  viewCount = viewCount + '$viewCount'  where  postID = $posid");

    $viewPost_query =  mysqli_query($conn,"SELECT * FROM postview where  postID = $posid");
    $data  = mysqli_fetch_assoc($viewPost_query);                         
    $theTitle = $data['title'];
    $userName = $data['username'];
    $dateCreated = $data['dateCreated'];
    $imgPath = $data['picture'];
    $postDesc = $data['content'];
    $views = $data['viewCount'];


    //Get cooments from Comments table for the current post
    $getCommentCount = mysqli_query($conn, "SELECT COUNT(*) as commentCount from comments where postID = '$posid'");
    $comments  = mysqli_fetch_assoc($getCommentCount);    
    $commentCount = $comments['commentCount'];

?>




<div class="container">
    <div class="card mb-4">

        <div class="card-header">
            <h2><?php echo $theTitle;?></h2>
        </div>

        <div class="card-body ">


            <?php //Username
                            echo " <strong>$userName</strong>";
                           //Date Created
                                 $dateCreated = strtotime($dateCreated); echo "<br>";
                                 $dateCreated = date("d-M-Y H:i", $dateCreated);
                                 echo "<small>". time_elapsed_string($dateCreated) ."</small> ";
                        ?>

            <hr>
            <p>
                <!-- //Post Image -->
                <img src="<?php echo $imgPath; ?>" class="d-block ui-w-40 rounded-3 w-100" alt="">
                <!-- //Post Content -->
                <?php  echo $postDesc;?>
            </p>

        </div>

        <div class="card-footer">
            <a href="javascript:void(0)" class="d-inline-block text-decoration-none">
                <i class="fas fa-heart"></i>
                <small class="align-middle p-3">
                    <?php echo $commentCount;?>
                </small>
            </a>
            <a href="javascript:void(0)" class="d-inline-block text-decoration-none ml-3">
                <i class="fas fa-comment align-middle text-muted "></i>
                <small class=" p-3 align-middle">
                    <?php echo $commentCount;?>
                </small>
            </a>
            <a href="javascript:void(0)" class="d-inline-block text-decoration-none ml-3">
                <i class="fas fa-eye align-middle text-muted "></i>
                <small class="align-middle">
                    <!--View Count-->
                    <?php echo $views;?>
                </small>
            </a>
            <?php
                        include_once("comments.php");
                ?>
        </div>
    </div>
</div>