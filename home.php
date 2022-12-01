<?php include_once('navabar.php');?>
<div id="container-fluid">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary float-end mx-4" style="width: 50px; height: 50px;border-radius:30px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
       <div class="fas fa-plus w-100"></div> 
    </button>
    <add key="webpages:Enabled" value="true" />

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New Post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="postForm" action="./post_process/insert.php" method="POST" enctype="multipart/form-data">
                    <div id="error" style="color: red; font-size: 24px;"></div>
                    <div class="form-group">
                        <label class="form-label">Post Title</label>
                        <input type="text" class="form-control" name="postTitle" id="postTitle">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Post Content</label>
                        <textarea class="form-control" id="postContent" name="postContent" rows="12" columns="24"></textarea>
                    </div>
                    <br>
                    <div class='form-group'>
                          <label class="form-label" for="postPic">Select a picture for your post</label>
                          <input type="file" class="form-control btn-primary" id="postPic" name="postPic">
                    </div>
                    </div>
                
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <input type="submit" name= 'btnReg' id="btnReg"  class="btn btn-outline-primary btn-lg" value="Create Post" />
                  </div>
                </form>
            </div>
        </div>
    </div>

    <h2 class='mx-5'>Most Viewed Posts of All Time</h2>
  <div class="d-flex justify-content-evenly">
        <div class="card" style="width: 20rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum magni dicta,
                    nesciunt mollitia, vero, nam eveniet neque molestiae unde in delectus dolorum explicabo a possimus
                    consequuntur temporibus corporis et qui. </p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 20rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 20rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function(){
        $("#error").addClass("d-none");

        $("#postForm").on("submit",function(e){
          e.preventDefault();
         

          var form_data = new FormData(this);

          var postTitle = $('#postTitle').val();
          var postContent = $('#postContent').val();
          var postPic =$('#postPic').val();

          $.ajax({
              url: "./post_process/insert.php",
              method: "post",
              dataType: "JSON",
              data:{
          postTitle:postTitle,
          postContent:postContent,
          postPic:postPic,
          btnReg:btnReg,
      },
              processData: false,
              conenttype: false,
              success:function(data){
                var obj = data;

                if (obj.status == 200) {
                  Window.location.assign('home.php');
                }
                if (obj.status == 404) {
                    $("#error").removeClass("d-none");
                    $("#error").text(obj.message);
                }
              }
          });
        });
    });

    function adduser(){
      var postTitle = $('#postTitle').val();
      var postContent = $('#postContent').val();
      var postPic =$('#postPic').val();
      var btnReg=$('#btnReg').val();
      
      $.ajax({
        url:"post_process/insert.php",
        type:'post',
        data:{
          postTitle:postTitle,
          postContent:postContent,
          postPic:postPic,
          btnReg:btnReg,
      },
        success:function(data){
            alert(data);
            var obj = jQuery.parseJSON(data);
            if (obj.status == 200) {
               Window.location.assign('home.php');
            }
            if (obj.status == 404) {
                $("#error").removeClass("d-none");
                $("#error").text(obj.message);
            }
             
        }
     });
    }
</script>
