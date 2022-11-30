<?php 
    require_once '../db_connect.php';

    $username =  htmlspecialchars($_POST['username']);
    $email  = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['username']);
    $status =  'Active';

if ((($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 20000))
{
    if ($_FILES["file"]["error"] > 0)
    {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br/>";
    }
    else
    {
        echo "Upload: " . $_FILES["file"]["name"] . "<br />";
        echo "Type: " . $_FILES["file"]["type"] . "<br />";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br/>";
        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br/>";
        if (file_exists("./Pictures/Profiles" . $_FILES["file"]["name"]))
        {
            echo $_FILES["file"]["name"] . " already exists. ";
        }
        else
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "./Pictures/Profiles/" . $_FILES["file"]["name"]);
            $avatar = "./Pictures/Profiles/" . $_FILES["file"]["name"];
            $sql = "INSERT INTO users VALUES('null', '$username', '$email', '$password', '$avatar', '$status', 'null', 'null')";

            $query_insert = mysqli_query($conn, $sql);
            if($query_insert){
                header("location: home.php");
            }
        }
    }
}
else
{
    echo "Invalid file";
}