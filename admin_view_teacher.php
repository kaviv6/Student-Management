<?php

session_start();
error_reporting(0);

    if(!isset($_SESSION['username']))
    {
        header("location:login.php");
    }

    elseif($_SESSION['usertype']=='student')
    {
        header("location:login.php");
    }

    include "connection.php";

    $sql="SELECT * FROM teacher";

    $result=mysqli_query($data,$sql);

    if($_GET['t_id']){

        $tea_id=$_GET['t_id'];

        $sql2="DELETE FROM teacher WHERE id='tea_id' ";

        $result2=mysqli_query($data,$sql2);

        if($result2)
        {
            echo "update success";
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
        .table_th{
            padding: 20px;
            font-size: 20px;
        }

        .table_td{
            padding: 20px;
            background-color:skyblue;
        }
    </style>


</head>
<body>
<?php

include "admin_sidebar.php";
?>

    
    <div class ="content">
        <center>
        <h1>View All Teacher Data</h1>
        <table border="1px">
            <tr>
                <th class="table_th">Teacher Name</th>
                <th class="table_th">About Teacher</th>
                <th class="table_th">Image</th>
                <th class="table_th">delete</th>
                <th class="table_th">update</th>
            </tr>
            <?php
             while($info=$result->fetch_assoc())
             {
             ?>   
            <tr>
                <td class="table_td">
                    <?php echo "{$info['name']}"?>
                </td>
                <td class="table_td">
                <?php echo "{$info['description']}"?>
                </td>
                <td class="table_td">
                <img src="<?php echo "{$info['image']}"?>" height =100px; width=100px>
                </td>
                <td class="table_td">
                <?php
                 echo "
                 <a class='btn btn-danger' onClick=\"javascript:return confirm('Are You Sure You Want To Delete This');\"href='admin_view_teacher.php?t_id={$info['id']}'> Delete </a>
                 "; ?>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
        </center>
    </div>

</body>
</html>