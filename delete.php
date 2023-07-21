<?php
include "connection.php";

if($_GET['student_id'])
{
    $user_id= $_GET['student_id'];

    $sql="DELETE FROM user WHERE id='$user_id' ";

    $result=mysqli_query($data,$sql);
}

if($result)
{
    header("location:view_student.php");
}

?>