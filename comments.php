<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Snippet - GoSNippets</title>
    <?php include_once('header.php');?>
    <style>
    body {
        background-color: #eee
    }

    .card {
        background-color: #fff;
        border: none
    }

    .form-color {
        background-color: #fafafa
    }

    .form-control {
        height: 48px;
        border-radius: 25px
    }

    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #35b69f;
        outline: 0;
        box-shadow: none;
        text-indent: 10px
    }

    .c-badge {
        background-color: #35b69f;
        color: white;
        height: 20px;
        font-size: 11px;
        width: 92px;
        border-radius: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 2px
    }

    .comment-text {
        font-size: 13px
    }

    .wish {
        color: #35b69f
    }

    .user-feed {
        font-size: 14px;
        margin-top: 12px
    }
    </style>

</head>


<div class="container mt-5 mb-5">
    <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-7">
            <div class="card">
                <div class="p-3">
                    <h6>Comments</h6>
                </div>
                <div class="mt-3 d-flex flex-row align-items-center p-3">
                    <img src="current/user/picture" width="50" class="rounded-circle mr-2">
                    <input type="text" class="form-control" placeholder="Enter your comment...">
                    <input type="button" class="btn btn-outline-primary rounded-2 mx-3" value="POST"/>
                </div>
                <div class="mt-2">
                    <div class="d-flex flex-row p-3"> <img src="https://i.imgur.com/zQZSWrt.jpg" width="40" height="40" class="rounded-circle mr-3">
                        <div class="w-100">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-row align-items-center"> 
                                    <span class="mr-2">Brian  selter</span> 
                                </div> 
                                <small>12h ago</small>
                            </div>
                            <p class="text-justify comment-text mb-0">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                            </p>
                            <div class="d-flex flex-row user-feed"> 
                                <span class="wish"><i class="fa fa-heart mr-2"></i>24</span> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</html>