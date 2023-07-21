<?php

    error_reporting(0);
    session_start();
    session_destroy();

    if($_SESSION['message'])
    {
        $message=$_SESSION['message'];

        echo "<script type ='text/JavaScript'>
        alert('$message');

            </script>" ;
    }

    include "connection.php";

    $sql="SELECT * FROM teacher";

    $result=mysqli_query($data,$sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="style.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <label class="logo">VNS-Schools</label>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Admission</a></li>
            <li><a href="login.php" class="btn btn-success">Login</a></li>
        </ul>
    </nav>

    <div class="section1">
        <label class ="img_text">We Teach Student With Care</label>
    <img  class="main_img" src="main.jpg" alt="mainimage">
    </div>

    <div class="container">

        <div class="row">

            <div class ="col-md-4">
                <img class ="School_img"src="School2.jpg" alt="School_img">

            </div>

            <div class="col-md-8">
                <h1>Welcome to VNS Schools</h1>
                <p>A heartfelt welcome message with encouraging words can tremendously boost students' morale and confidence. Encouraging words to bring out their best, and thoughtful words can help boost their self-confidence.
                e are happy you are all here! Let us make this new academic year special with a relentless thirst for knowledge. Wish you all success!
                It’s so amazing to hear the unmistakable chatter of students in school again. We missed you a lot! Hope you had a fun-filled holiday season and are eagerly looking forward to a year of fun and learning. Welcome back!
                </p>

            </div>
        </div>

    </div>    
    

    <center>
        <h1>Our Teachers</h1>
        <div class="container">

        <div class="row">
            <?php 
            while($info=$result->fetch_assoc())
            {
            ?>
            <div class="col-md-4">
                <img class ="teacher" src=<?php echo "{$info['image']}" ?>>
                <h3><?php echo "{$info['name']}" ?></h3>
                <h5><?php echo "{$info['description']}" ?></h5>
                
            </div>
            <?php 
            }
            ?>
        </div>
    </center>
    
        <center><h1>Our courses</h1></center>
   

    <div class="container">

        <div class="row">

            <div class="col-md-4">
                <img class ="course" src="ML.jpeg" alt="ML">
                <h1>MACHINE LEARNING</h1>
                <p>Machine learning is a branch of artificial intelligence (AI) and computer science which focuses on the use of data and algorithms to imitate the way that humans learn, gradually improving its accuracy.
                </p>
            </div>

            <div class="col-md-4">
            <img class ="course" src="AI.jpeg" alt="AI">
            <h1>Artificial intelligence</h1>
            <p>As the hype around AI has accelerated, vendors have been scrambling to promote how their products and services use it. Often, what they refer to as AI is simply a component of the technology, such as machine learning. AI requires a foundation of specialized hardware and software for writing and training machine learning algorithms. No single programming language is synonymous with AI, but Python, R, Java, C++ and Julia have features popular with AI developers.
                </p>
            </div>

            <div class="col-md-4">
            <img class ="course" src="cloud.jpeg" alt="cloud">
            <h1>Cloud computing</h1>
            <p>Cloud computing is on-demand access, via the internet, to computing resources—applications, servers (physical servers and virtual servers), data storage, development tools, networking capabilities, and more—hosted at a remote data center managed by a cloud services provider (or CSP). The CSP makes these resources available for a monthly subscription fee or bills them according to usage.
                </p>
            </div>
        </div>

    </div>

    <center>
        <h1>Admission Form</h1>
    </center>

    <div align="center" class="admission_form">
        <form action="data_check.php" method="POST">
            <div class="adm_int">
                <label class="lable_text">Name</label>
                <input class="input_deg" type="text" name="name">
            </div>

            <div class="adm_int">
                <label class="lable_text">Email</label>
                <input class="input_deg" type="text" name="email">
            </div>

            <div class="adm_int">
                <label class="lable_text">phone</label>
                <input class="input_deg" type="text" name="phone">
            </div>

            <div class="adm_int">
                <label class="lable_text">message</label>
                <textarea class="input_txt" name="message"></textarea>
            </div>

            <div class="adm_int">
                <input class ="btn btn-primary" id ="submit" type="Submit" value ="apply" name="apply">
            </div>
        </form>
    </div>
    <footer>
        <h2>All @copyright reserved by VNS Schools ltd.</h2>
    </footer>
</body>
</html>