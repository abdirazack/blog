<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Snippet - GoSNippets</title>
    <?php include_once('header.php');?>
</head>


                <div class="form-outline mb-4">
                    <div id="error"></div>
                    <label class="form-label" for="addANote">+ Comment</label>
                    <textarea class="form-control" id="commentContent" rows="3" placeholder="Type your comment..."></textarea>
                    <Button class='btn btn-outline-primary mt-3' id="btnComment" onclick="postComment()">Post Comment</Button>
                </div>

                <div class="card mb-4 " style="" id="displayCommentArea">
                    
                    
                </div>


<script>
     $(document).ready(function() {
            displayComments();
            $("#error").addClass("d-none");
            $("#nocomment").addClass("d-none");
        });
        //display data

        function displayComments() {
            setInterval(() => {
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
            }, 1000);  
        }


        function postComment() {
            var commentContent = $('#commentContent').val();
            var postid = <?php echo $_SESSION['currentPost']?>;
            var userid = <?php echo $_SESSION['userid']?>;
            var btnComment = $('#btnComment').val();

            $.ajax({
                url: "./comments_process/insert.php",
                type: 'post',
                data: {
                    commentContent: commentContent,
                    postid: postid,
                    userid: userid,
                    btnComment: btnComment,
                },
                success: function(data) {
                    var obj = jQuery.parseJSON(data);
                    if (obj.status === 200) {
                        displayComments();
                        $('#commentContent').val("");
                    }
                    if (obj.status === 404) {
                        $("#error").removeClass("d-none");
                        $("#error").text(obj.message);
                    }

                }
            });
        }

        function loadDoc() {
            setInterval(() => {
                var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("displayCommentArea").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "./comments_process/getComments.php", true);
            xhttp.send();
            }, 1000);   
        }
        loadDo();

    </script>