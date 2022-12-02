<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Snippet - GoSNippets</title>
    <?php include_once('header.php');?>
</head>

<div class="row d-flex justify-content-center mt-3">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-0 border" style="background-color: #f0f2f5;">
            <div class="card-body p-4">
                <div class="form-outline mb-4">
                    <div id="error"></div>
                    <label class="form-label" for="addANote">+ Comment</label>
                    <textarea class="form-control" id="commentContent" rows="3" placeholder="Type your comment..."></textarea>
                    <Button class='btn btn-outline-primary mt-3' id="btnComment" onclick="postComment()">Post Comment</Button>
                </div>

                <div class="card mb-4 " id="displayCommentArea">
                    
                    <h4 id="nocomment">Be the First To Comment</h4>
                </div>

            </div>
        </div>
    </div>
</div>


<script>
     $(document).ready(function() {
            displayComments();
            $("#error").addClass("d-none");
            $("#nocomment").addClass("d-none");
        });
        //display data

        function displayComments() {
            var displayData = "true";
            $.ajax({
                url: "./comments_process/getComments.php",
                type: 'post',
                data: {
                    displaysend: displayData

                },
                success: function(data, status) {
                    $('#displayCommentArea').html(data);

                }
            });
        }


        function postComment() {
            var commentContent = $('#commentContent').val();
            var postid = <?php echo $_SESSION['currentPost']?>;
            var userid = <?php echo $_SESSION['userid']?>;
            var btnComment = $('#btnComment').val();

            $.ajax({
                url: "comments_process/insert.php",
                type: 'post',
                data: {
                    commentContent: commentContent,
                    postid: postid,
                    userid: userid,
                    btnComment: btnComment,
                },
                success: function(data) {
                    if (data.status === 200) {
                        $('#commentContent').val("");
                        displayComments();
                    }
                    if (data.status === 404) {
                        $("#error").removeClass("d-none");
                        $("#error").text(obj.message);
                    }
                    if (data.status === 22) {
                        $("#nocomment").removeClass("d-none");
                    }

                }
            });
        }

    </script>