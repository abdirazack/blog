<?php include_once('navabar.php'); ?>
<div id="container-fluid">
    <!-- Button trigger modal -->

    <button type="button" class="btn btn-primary float-end mx-4" style="width: 50px; height: 50px;border-radius:30px;"
        data-bs-toggle="modal" data-bs-target="#createPost">
        <div class="fas fa-plus w-100"></div>
    </button>
    <add key="webpages:Enabled" value="true" />

    <!-- switch -->
    


    <!-- Modal for creating new post-->
    <div class="modal fade" id="createPost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New Post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="postForm"  method="POST" enctype="multipart/form-data">
                        <div id="error" style="color: red; font-size: 24px;"></div>
                        <div class="form-group">
                            <label class="form-label">Post Title</label>
                            <input type="text" class="form-control" name="postTitle" id="postTitle">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Post Content</label>
                            <textarea class="form-control" id="postContent" name="postContent" rows="12"
                                columns="24"></textarea>
                        </div>
                        <br>
                        <div class='form-group'>
                            <label class="form-label" for="postPic">Select a picture for your post</label>
                            <input type="file" class="form-control btn-primary" id="avatar" name="avatar">
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" name='btnReg' id="btnReg" class="btn btn-outline-primary btn-lg"
                        value="Create Post"/>
                </div>
                </form>
            </div>
        </div>
    </div>

    <h2 class='mx-5'>Most Viewed Posts of All Time</h2>
    <div class="container ">

            <div class="row row-cols-3 row-cols-md-3 g-4" id="displayPostArea"></div>
    </div>
    <!--=====================================================Posts End======================================================-->
    <script>
    $(document).ready(function() {
        $("#error").addClass("d-none");

        $("#postForm").submit(function(e) {
            e.preventDefault();
            
            $.ajax({
                type: "POST",
                url: "post_process/insert.php",
                cache: false,
                contentType: false,
                processData: false,
                method: "POST",
                data: new FormData($(this)[0]),
                success: function(data) {
                    obj = jQuery.parseJSON(data);
                    alert(data);
                    if (obj.status === 200) {
                        $('#createPost').modal("hide");
                        $('.modal-backdrop').remove();
                        displayPosts();
                    }
                    if (obj.status === 404) {
                        $("#error").removeClass("d-none");
                        $("#error").text(obj.message);
                    }
                    }
                });
            });
    });

   

    $(document).ready(function() {
        displayPosts();


        $("#darkmode").click(function() {
            
                $("#createPost").removeClass("bg-light");
                $("#createPost").addClass("bg-dark");
                $("#createPost").addClass("text-black");

                $("body").removeClass("bg-light");
                $("body").addClass("bg-dark");
                $("body").addClass("text-white");

                $("#nav").removeClass("bg-light");
                $("#nav").addClass("bg-dark");
                $("#nav").addClass("text-black");

    });
    });
    //display data

    function displayPosts() {
        var displayData = "true";
        $.ajax({
            url: "./post_process/getPost.php",
            type: 'post',
            data: {
                displaysend: displayData

            },
            success: function(data, status) {
                $('#displayPostArea').html(data);

            }
        });
    }
    </script>
