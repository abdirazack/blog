<?php include_once("navabar.php");
    include("db_connect.php");

    $posid = $_GET['pid'];
    $_SESSION['currentPost'] = $posid;
?>
<?php
                                
                                $getTitle = mysqli_query($conn, "SELECT posts.title FROM posts where postID = $posid;");
                                $getUser = mysqli_query($conn, "SELECT users.username FROM users INNER JOIN posts ON users.userID = posts.userID;");
                                $getDate = mysqli_query($conn, "SELECT users.dateCreated FROM users INNER JOIN posts ON users.userID = posts.userID;");
                                $getImage = mysqli_query($conn, "SELECT posts.picture FROM posts where postID = $posid;");
                                $getContent = mysqli_query($conn, "SELECT posts.content FROM posts where postID = $posid;");

                                if($rowTitle = mysqli_fetch_assoc($getTitle)){
                                    $theTitle = $rowTitle["title"];
                                }
                                if($rowUser = mysqli_fetch_assoc($getUser)){
                                    $userName = $rowUser["username"];
                                }
                                if ($rowDate = mysqli_fetch_assoc($getDate)){
                                    $dateCreated = $rowDate["dateCreated"];
                                }
                                if ($rowImage = mysqli_fetch_assoc($getImage)){
                                    $imgPath = $rowImage["picture"];
                                }
                                if ($rowContent = mysqli_fetch_assoc($getContent)){
                                    $postDesc = $rowContent["content"];
                                }
    ?>



<div class="bordered text-center shadow">
    <div class="col-5">
        <div class="card mb-4">

            <div class="card-header">
                <h2><?php echo $theTitle;?></h2>
            </div>

            <div class="card-body ">

                <div class="media mb-3">

                    <div class="media-body ml-3">

                        <?php //Username
                            echo " <strong>$userName</strong>";
                           //Date Created
                                 $dateCreated = strtotime($dateCreated);
                                 $dateCreated = date("d-M-Y H:i", $dateCreated);
                                 echo "<small> $dateCreated</small> ";
                        ?>
                    </div>
                    <hr>
                    <p>
                        <!-- //Post Image -->
                        <img src="<?php echo $imgPath; ?>" class="d-block ui-w-40 rounded-3 w-100" alt="">
                        <!-- //Post Content -->
                        <?php  echo $postDesc;?>
                    </p>
                </div>


                <a href="javascript:void(0)" class="ui-rect ui-bg-cover"
                    style="background-image: url('/Pictures/Profiles/bp.jpg');"></a>
            </div>

            <div class="card-footer">
                <a href="javascript:void(0)" class="d-inline-block text-decoration-none">
                    <i class="fas fa-heart"></i>
                    <small class="align-middle p-3">
                        <!--Favourite-->
                    </small>
                </a>
                <a href="javascript:void(0)" class="d-inline-block text-decoration-none ml-3">
                    <i class="fas fa-comment align-middle text-muted "></i>
                    <small class=" p-3 align-middle">
                        <!--Comment Count-->
                    </small>
                </a>
                <a href="javascript:void(0)" class="d-inline-block text-decoration-none ml-3">
                    <i class="fas fa-eye align-middle text-muted "></i>
                    <small class="align-middle">
                        <!--View Count-->
                    </small>
                </a>
                <?php
                        include_once("comments.php");
                ?>
            </div>
        </div>
    </div>
</div>