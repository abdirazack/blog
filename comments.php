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
                    <label class="form-label" for="addANote">+ Comment</label>
                    <input type="text" id="addANote" class="form-control" placeholder="Type comment..." />
                    <Button class='btn btn-outline-primary mt-3'>Post Comment</Button>
                </div>

                <div class="card mb-4" id="displayCommentArea">
                    
                </div>

            </div>
        </div>
    </div>
</div>


<script>
     $(document).ready(function() {
            displayPosts();
        });
        //display data

        function displayPosts() {
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
    </script>