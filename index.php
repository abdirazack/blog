<?php
include('header.php');
include('db_connect.php');
?>
<head>
<link rel="icon" type="image/x-icon" href="./Pictures/icon.ico">
<title>COWt</title>
</head>
<header>
    <div class='m-5 shadow p-5'>
        <center>
            <h1>COWT</h1>
        </center>
    </div>
    <center>
    <div>
        <h2>Welcome to COWT. <brtouched>The most amazing blog on the world wide web.</h2>
        <h3>Come express yourself</h3>
    </div>
    </center>
    <div class="h-10 d-flex align-items-center justify-content-center m-5">
        <a  href='./userReg.php' class='btn btn-primary mx-5'>Register</a>
        <a  href='./login.php' class='btn btn-dark mx-5'>Log In</a>
    </div>

</header>

<body>
<h2 class='mx-5'>Most Viewed Posts of All Time</h2>
    <div class="container ">

            <div class="row row-cols-3 row-cols-md-3 g-4" id="displayPostArea">

            </div>
    </div>
</body>

<script>

    $(document).ready(function(){
        displayPosts();

    });


    function displayPosts() {
        var displayData = "true";
        $.ajax({
            url: "./index_process.php",
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
