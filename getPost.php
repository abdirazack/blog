<?php
    require_once("./db_connect.php");
    $postID = "";
    if(isset($_POST['displaysend'])){

        $query=mysqli_query($conn,"select * from posts");
        if(mysqli_num_rows($query)>0){
        while($rows=mysqli_fetch_array($query)){
            $postID = $rows['postID'];
        ?>
       
            <div class="card" >
                <img src="<?php echo $rows['picture']  ?>" class="card-img-top" alt="">
                <div class="card-body">
                        <h5 class="card-title">  <?php echo $rows['title']  ?></h5>
                        <!-- <p class="card-text">  <?php echo $rows['content']  ?> </p> -->
                        <Button onclick="viewPost()" class="btn btn-primary w-100">View Post</Button>
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
<script>
    function viewPost(){
         window.location.assign("./viewPost.php?pid=<?php echo $postID;?>")
    }
</script>
