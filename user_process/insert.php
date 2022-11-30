<?php 
    require_once 'db_connect.php';

    $username =  htmlspecialchars($_POST['username']);
    $email  = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['username']);
    $avatar = $_FILES['avatar'];
    $status =  'Active';