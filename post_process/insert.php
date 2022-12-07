<?php 
echo $filename =  $_FILES["avatar"]["name"];
echo $filetype =  $_FILES["avatar"]["type"];

die();
/*
    require_once '../db_connect.php'; 

    if(isset($_POST['btnReg']) && isset($_FILES['avatar'])){

        $postTitle =  htmlspecialchars($_POST['postTitle']);
        $postContent  = htmlspecialchars($_POST['postContent']);
        $status =  'Active';
        $userID = '';

        if(!isset($_SESSION['userID'])){
            $username = $_SESSION['username'];
            $email = $_SESSION['email'];
            $query = mysqli_query($conn,"select * from users where username='$username' and email ='$email'");
            if($result=mysqli_fetch_array($query)){ 
                $userID = $result['userID'];
            }
            else{
                $data = ['message'=>'Failed to execute query', 'status'=>404];
                echo json_encode($data);
                return ;
            }

        }else{
            $userID = $_SESSION['userID'];
        }

        $filename =  $_FILES["avatar"]["name"];
        $filesize = ($_FILES["avatar"]["size"]/1024);
        $filetype =  $_FILES["avatar"]["type"];
        $temp_name = $_FILES["avatar"]["tmp_name"];
        $fileError = $_FILES["avatar"]["error"];

        if(empty($postTitle)){
            $data = ['message'=>'User Name can not be empty', 'status'=>404];
            echo json_encode($data);
            return ;
        }
        if(empty($postContent)){
            $data = ['message'=>'Email can not be empty', 'status'=>404];
            echo json_encode($data);
            return ;
        }


        if ((( $filetype == "image/png") || ( $filetype == "image/jpeg") || ( $filetype == "image/pjpeg")) && ($filesize  < 200))
        {
            if ($fileError > 0)
            {
                $data = ['message'=> " $fileError ", 'status'=>404];
                echo json_encode($data);
                return ;
            }
            else
            {
                if (file_exists("../Pictures/Posts" .  $filename))
                {
                        $data = ['message'=>'A file with the same name already exists.', 'status'=>404];
                        echo json_encode($data);
                        return ;
                }
                else
                {
                    if(move_uploaded_file($temp_name , "../Pictures/Posts/" .  $filename)){
                        $avatar = "./Pictures/Posts/" .  $filename;
                        $sql = "INSERT INTO posts VALUES('null', '$postTitle', '$postContent', '$avatar', '0', '0', '$status', $userID, null, null)";

                        $query_insert = mysqli_query($conn, $sql);
                        if($query_insert){
                            // $data = ['message'=>'Success', 'status'=>200];
                            // echo json_encode($data);
                            // return ;
                            header("location: ../home.php");
                        }
                        else{
                            $data = ['message'=>'Failed to Create Posts', 'status'=>404];
                            echo json_encode($data);
                            return ;
                        }
                    }
                    else{
                        $data = ['message'=>'Failed to move file', 'status'=>404];
                        echo json_encode($data);
                        return ;
                    }
                    
                }
            }
        }
        else
        {
            $data = ['message'=>'Invalid File', 'status'=>404];
                        echo json_encode($data);
                        return ;
        }

    }
    else{
        $data = ['message'=>'Button was not set', 'status'=>404];
        echo json_encode($data);
        return ;
    }
?>*/

?>


