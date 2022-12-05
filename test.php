<form action="test.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="avatar" id="avatar"/>
                <input type="submit" name="btnUpdateProf" id="btnUpdateProf" value="Update"/>

</form>

<?php
if(isset($_POST['btnUpdateProf'])){
   
    echo $_FILES["avatar"]["name"];
   
}
else{
    echo 'failed';
}
?>