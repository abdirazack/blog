<?php 
    require_once '../db_connect.php';
    session_start();

    if(isset($_POST['btnReg']) && isset($_FILES['avatar'])){

        $username =  htmlspecialchars($_POST['username']);
        $email  = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $status =  'Active';

        $filename =  $_FILES["avatar"]["name"];
        $filesize = ($_FILES["avatar"]["size"]/1024);
        $filetype =  $_FILES["avatar"]["type"];
        $temp_name = $_FILES["avatar"]["tmp_name"];
        $fileError = $_FILES["avatar"]["error"];

        if(empty($username)){
            $data = ['message'=>'User Name can not be empty', 'status'=>404];
            echo json_encode($data);
            return ;
        }
        if(empty($email)){
            $data = ['message'=>'Email can not be empty', 'status'=>404];
            echo json_encode($data);
            return ;
        }
        if(empty($password)){
            $data = ['message'=>'Password can not be empty', 'status'=>404];
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
                if (file_exists("../Pictures/Profiles" .  $filename))
                {
                        $data = ['message'=>'A file with the same name already exists.', 'status'=>404];
                        echo json_encode($data);
                        return ;
                }
                else
                {
                    if(move_uploaded_file($temp_name , "../Pictures/Profiles/" .  $filename)){
                        $avatar = "./Pictures/Profiles/" .  $filename;
                        $sql = "INSERT INTO users VALUES('null', '$username', '$email', '$password', '$avatar', '$status', null, null)";

                        $query_insert = mysqli_query($conn, $sql);
                        if($query_insert){
                            // $data = ['message'=>'Success', 'status'=>200];
                            // echo json_encode($data);
                            // return ;
                            $_SESSION['username'] = $username;
                            $_SESSION['email'] = $email;
                            header("location: ../home.php");
                        }
                        else{
                            $data = ['message'=>'Failed to register database', 'status'=>404];
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
?>
