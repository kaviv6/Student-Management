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


</head>
<body>
<?php

include "admin_sidebar.php";
?>

    <aside>
        <div class ="content">
            <h1>Admin Dashbord</h1>
        </div>
    </aside>
</body>
</html>