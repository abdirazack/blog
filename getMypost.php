
<style>
    *{
        
    }
</style>
<?php
    include("header.php");
    require_once("db_connect.php");

    $userid = $_SESSION['userid'];

        $query=mysqli_query($conn,"select * from posts where userID='$userid'");
      if(mysqli_num_rows($query)>0){
       while($rows=mysqli_fetch_array($query)){
           $postID = $rows['postID'];
?>


<div class="col">


<div class="d-flex justify-content-evenly mt-5">
        <img src="<?php echo $rows['picture']  ?>" class="img-thumbnail rounded-2"
            style="width: 100px; height: 100px; border-radius: 50%" alt="Post picture">
        <h5 class="m-2 text-uppercase text-center"> <?php echo $rows['title']  ?></h5>
        <Button onclick="viewPost('<?php echo $postID;?>')" class="btn btn-outline-primary h-10 rounded-5" style="height: 10%; weight:20px">View Post</Button>
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

?>
<script>
function viewPost(str) {
    window.location.assign('./viewPost.php?pid=' + str);
}
</script>