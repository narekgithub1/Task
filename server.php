<?php
if(isset($_FILES['myimage']['tmp_name'])) {
    $path = "uploads/".$_FILES['myimage']['name'];
    $name=$_FILES['myimage']['name'];
    move_uploaded_file($_FILES['myimage']['tmp_name'],$path);

    $db=new Mysqli("localhost","root","","postdata");
    $query = "INSERT INTO data SET name = '$name' , path = '$path'";
    $db->query($query);

}

?>
