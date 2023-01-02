<?php

    session_start();
    if(isset($_SESSION['admin_id']))
    {
        header("location:admin_page.php");
        exit();
    }
    if(isset($_SESSION['faculty_id']))
    {
        header("location:admin_page.php");
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Login</title>
</head>
<style>
    body
    {
        background-image: url('https://img.freepik.com/free-vector/high-school-concept-illustration_114360-8279.jpg?w=2000');
        background-position:center;
        background-repeat: no-repeat;
        margin-top: 200px;
    }
    .main
    {
        background-color: rgba(30, 174, 210, 0.571);
    }
</style>
<body>
    <div class="main m-5 p-5">
        <div class="header text-center">
            <h1>Login</h1>
        </div>
        <hr>
        <div class="login ml-5 mr-5">
            <form action="" id="login" method="post">
                <div class="row">
                    <div class="col-sm-4 mt-2"></div>
                    <div class="col-sm-4 mt-2">
                        <input type="text" name="email" required placeholder="Email" class="form-control" id="email">
                    </div>
                    <div class="col-sm-4 mt-2"></div>
                    <div class="col-sm-4 mt-2"></div>
                    <div class="col-sm-4 mt-2">
                        <input type="password" name="password" required placeholder="Password" class="form-control" id="password">
                    </div>
                    <div class="col-sm-4 mt-2"></div>
                    <div class="col-sm-4 mt-2"></div>
                    <div class="col-sm-4 mt-2">
                        <input type="submit" name="login" value="Login" class="form-control btn btn-success">
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-sm-4 mt-2"></div>
                <div class="col-sm-4 mt-2">
                    <h6 class="text-light">I don't have an account <a href="register.php" class="text-danger">Register</a> </h5>
                </div>
                <div class="col-sm-4 mt-2"></div>
            </div>
            
        </div>
    </div>
    
</body>    
</html>
<?php 
    if(isset($_POST["login"]))
    {
        $email=$_POST["email"];
        $password=$_POST["password"];
        if($email == "admin@gmail.com" AND $password == "admin")
        {
            $id = "0000";
            $_SESSION['admin_id']=$id;
                header("location:admin_page.php");
            }
        else 
        {
            $con=mysqli_connect('localhost','root','','school');
            $query="SELECT * FROM `faculty` WHERE email='$email' AND password='$password'";
            $run=mysqli_query($con,$query);
            $row=mysqli_num_rows($run);
            $data=mysqli_fetch_assoc($run);
        
            if($row<1)
            {
                ?>
                <script>
                    alert('Email and Password is not Correct');
                </script>
                <?php
            }
            else
            {   
                if($data['Ranked'] != '0')
                {
                    
                    $id=$data['id'];
                    $ranked = $data['Ranked'];
                    $_SESSION['faculty_id']=$id;
                    $_SESSION['ranked']=$ranked;
                    ?>
                    <script>
                        alert('Email and Password is Correct');
                    </script>
                    <?php
                    header("location:faculty_page.php");
                }
                if($data['Ranked'] == '0')
                {
                  
                    $id=$data['id'];
                    $ranked = $data['Ranked'];
                    $_SESSION['student_id']=$id;
                    $_SESSION['ranked']=$ranked;
                    echo '<script>alert("Id is:")</script>';
                    header("location:student_page.php");
                }
                

            }

        }
    }
?>
 