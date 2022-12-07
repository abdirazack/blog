<?php
    require_once("../db_connect.php");
    $postID = "";
    if(isset($_POST['displaysend'])){

        $query=mysqli_query($conn,"select * from posts");
        if(mysqli_num_rows($query)>0){
        while($rows=mysqli_fetch_array($query)){
            $postID = $rows['postID'];
        ?>



<div class="col">
<div class="card m-1 p-0" style="width: 100%;">

    <div class="card-header  bg-light ml-0 p-0 " style="font-family: 'poppins';">
        <h5 class="m-2 text-uppercase text-center"> <?php echo $rows['title']  ?></h5>
    </div>

    <div class="card-body m-0 p-0">
        <!-- <p class="card-text">  <?php echo $rows['content']  ?> </p> -->
        <div class="card-img">
            <img src="<?php echo $rows['picture']  ?>" class="mt-1 mb-1 p-0" style="width: 100%; height: 250px;" alt="Post picture">
        </div>
    </div>

    <div class="card-footer bg-primary m-0 p-0" style="height: 40px;">
    <style>
        .btn:hover{
            color: white;
            background-color: darkblue;
        }
    </style>
        <Button onclick="viewPost('<?php echo $postID;?>')" class="btn btn-succes h-100 m-0 p-0 w-100 " style="font-family: 'poppins'; font-weight:600;">View Post</Button>
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
<script>
function viewPost(str) {
    window.location.assign('./viewPost.php?pid=' + str);
}
</script>