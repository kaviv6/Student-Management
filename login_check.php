<?php
error_reporting(0);
session_start();
include "connection.php";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name= $_POST['username'];

    $pass= $_POST['password'];

    $sql="select * from user where username='".$name."' AND password='".$pass."' ";

    $result=mysqli_query($data,$sql);

    $row=mysqli_fetch_array($result);

    if($row["usertype"]=="student")

    {
        
        $_SESSION['username']=$name;
        $_SESSION['usertype']="student";
        header("location:studenthome.php");
    
    }    
    elseif($row["usertype"]=="admin")

    {
        $_SESSION['username']=$name;
        $_SESSION['usertype']="admin";
        header("location:adminhome.php");
    }
    else
    {
        session_start();
        $msg = "invalid user";
        $_SESSION['loginMessage']=$msg;
        header("location:login.php");
    }
    


}



?>