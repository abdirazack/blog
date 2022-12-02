<?php include_once('navabar.php'); ?>
<div id="container-fluid">
    <!-- Button trigger modal -->

    <button type="button" class="btn btn-primary float-end mx-4" style="width: 50px; height: 50px;border-radius:30px;"
        data-bs-toggle="modal" data-bs-target="#exampleModal">
        <div class="fas fa-plus w-100"></div>
    </button>
    <add key="webpages:Enabled" value="true" />

    <!-- Modal for creating new post-->
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
                        value="Create Post" />
                </div>
                </form>
            </div>
        </div>
    </div>

    <h2 class='mx-5'>Most Viewed Posts of All Time</h2>
    <div class="container ">
        <div class="row">
            <div class="row col-sm" id="displayPostArea"></div>
            <!-- <div class="row col-md-auto" id="displayPostArea"></div>
            <div class="row row-lg-1" id="displayPostArea"></div> -->
        </div>
    </div>
    <!--=====================================================Posts End======================================================-->
    <script>
    $(document).ready(function() {
        $("#error").addClass("d-none");
    });

    function adduser() {
        var postTitle = $('#postTitle').val();
        var postContent = $('#postContent').val();
        var postPic = $('#postPic').val();
        var btnReg = $('#btnReg').val();

        $.ajax({
            url: "post_process/insert.php",
            type: 'post',
            data: {
                postTitle: postTitle,
                postContent: postContent,
                postPic: postPic,
                btnReg: btnReg,
            },
            success: function(data) {
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

    $(document).ready(function() {
        displayPosts();
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