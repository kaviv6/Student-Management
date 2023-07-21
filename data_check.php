 <?php
session_start();

include "connection.php";

if(isset($_POST['apply']))
{
    $data_name=$_POST['name'];

    $data_email=$_POST['email'];

    $data_phone=$_POST['phone'];

    $data_message=$_POST['message'];


    $sql="INSERT INTO addmission(name,email,phone,message) VALUES ('$data_name',' $data_email',' $data_phone','$data_message')";

    $result=mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['message']="Your application is sucessfull";
            
        header("location:index.php");
    }
        else
        {
            echo "Application Failed";
        }
    }
?>
