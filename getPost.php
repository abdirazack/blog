<?php
    require_once("./db_connect.php");
    $postID = "";
    if(isset($_POST['displaysend'])){

        $query=mysqli_query($conn,"select * from posts");
        if(mysqli_num_rows($query)>0){
        while($rows=mysqli_fetch_array($query)){
            $postID = $rows['postID'];
        ?>

<!--====================================================================================================================-->
<div style="margin:0%; padding: 0%;" class="card w-50 h-50 mb-5">


        <div class="card-header  p-0 m-0 h-100 w-100 mb-1 ">
            <h5 class="text-xl-start m-3"> <?php echo $rows['title']  ?></h5>
        </div>

        <div class="card-img">
            <img src="<?php echo $rows['picture']  ?>" class="card-img-top mx-auto d-block" style="width: 98%; height: 18rem;" alt="">
        </div>

        <!-- <p class="card-text">  <?php echo $rows['content']  ?> </p> -->
        <div class="card-footer p-0 m-0 h-100 w-100 mt-1 rounded-bottom">
            <Button onclick="viewPost()" class="btn btn-primary h-100 w-100 rounded-0 rounded-bottom bg-secondary border-0">View Post</Button>
        </div>


</div>
<!--====================================================================================================================-->
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
<script>
function viewPost() {
    window.location.assign("./viewPost.php?pid=<?php echo $postID;?>")
}
</script>