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
            <a href="javascript:void(0)" id="favs" class="d-inline-block text-decoration-none">
                <i class="far fa-heart" id="favicon"></i>
                <small class="align-middle p-3" id="favitext">
                    <!-- favorite count -->
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


<script>
    $(document).ready(function () {
        $("#favs").click(function () {
            $.ajax({
                type: "POST",
                url: "favorite_process/insert.php",
                cache: false,
                contentType: false,
                processData: false,
                method: "POST",
                success: function (data) {
 
                   var obj = jQuery.parseJSON(data);
                   if (obj.status == 200) {
                        displayfavs();
                   }
                   else {
                    alert(obj.message);
                   }
                }
            });
        });
    });

    $(document).ready(function() {
        displayfavs();
        check();
    });
    //display data

    function displayfavs() {
        var displayData = "true";
        $.ajax({
            url: "./favorite_process/getfavs.php",
            type: 'post',
            data: {
                displaysend: displayData

            },
            success: function(data) {
 
                var obj = jQuery.parseJSON(data);
                if(obj.status == 200){
                    $('#favitext').text(obj.message);
                }
                else if(obj.status === 303){
                    $('#favitext').text(obj.message);
                }
                else
                {
                    alert(obj.messsage);
                }
            }
        });
        check();
    }

    function check() {
        var displayData = "true";
        $.ajax({
            url: "./favorite_process/check.php",
            type: 'post',
            data: {
                displaysend: displayData

            },
            success: function(data) {
                var obj = jQuery.parseJSON(data);
                if(obj.status == 200){
                    $('#favicon').removeClass("far");
                    $('#favicon').addClass("fas");
                }
                 if(obj.status === 404){
                    $('#favicon').removeClass("fas");
                    $('#favicon').addClass("far");
                }
                
            }
        });
    }
    
</script>