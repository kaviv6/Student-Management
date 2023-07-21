<?php

session_start();
    if(!isset($_SESSION['username']))
    {
        header("location:login.php");
    }

    elseif($_SESSION['usertype']=='student')
    {
        header("location:login.php");
    }

    include "connection.php";

    if(isset($_POST['add_teacher']))
    {
        $t_name=$_POST['name'];
        
        $t_description=$_POST['description'];
        
        $file=$_FILES['image']['name'];
        $file_tmp=$_FILES['image']['tmp_name'];

        $dst_db="image/.$file";

        move_uploaded_file($file_tmp,$dst_db);

        $sql="INSERT INTO teacher(name,description,image) VALUES ('$t_name','$t_description','$dst_db')";

        $result=mysqli_query($data,$sql);

        if($result)
        {
            header("location:admin_add_teacher.php");
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashbord</title>

    <?php

        include "admin_css.php";
    ?>

<style type="text/css">
        label{
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top:10px;
            padding-bottom: 10px;
        }

        .div_deg{
            background-color: skyblue;
            width: 500px;
            padding-top:70px;
            padding-bottom:70px;
        }
    </style>


</head>
<body>
<?php

include "admin_sidebar.php";
?>

    <div class ="content">
        <center>
        <h1>Add Teacher</h1>

        <br><br>
        <div class="div_deg">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div>
                    <label>Name</label>
                    <input type="text" name="name">
                </div>
                <br>

                <div>
                    <label>Description</label>
                    <textarea name="description" id="" cols="30" rows="10" style="height: 36px; width: 206px;"></textarea>
                </div>
                <br>

                <div>
                    <label>Image</label>
                    <input type="file" name=image>
                </div>
                <br>

                <div>
                    <input class="btn btn-primary"type="submit" name="add_teacher" value="Add Teacher">
                </div>
            </form>
        </div>
        </center>
    </div>
</body>
</html>