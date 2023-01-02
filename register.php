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
    <title>Register</title>
</head>
<style>
    body
    {
        background-image: url('https://img.freepik.com/free-vector/high-school-concept-illustration_114360-8279.jpg?w=2000');
        background-position:center;
        background-repeat: no-repeat;
        margin-top: 100px;
    }
    .main
    {
        background-color: rgba(30, 174, 210, 0.571);
    }
</style>
<body>
    <div class="main m-5 p-5">
        <div class="header text-center">
            <h1>Register</h1>
        </div>
        <hr>
        <div class="register ml-5 mr-5">
            <form action="" id="register" method="post">
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
                        <input type="text" name="name" required placeholder="Full Name" class="form-control" id="password">
                    </div>
                    <div class="col-sm-4 mt-2"></div>

                    <div class="col-sm-4 mt-2"></div>
                    <div class="col-sm-4 mt-2">
                        <input type="text" name="department" required placeholder="Department" class="form-control" id="password">
                    </div>
                    <div class="col-sm-4 mt-2"></div>

                    <div class="col-sm-4 mt-2"></div>
                    <div class="col-sm-4 mt-2">
                        <input type="text" name="desig" required placeholder="Designation" class="form-control" id="password">
                    </div>
                    <div class="col-sm-4 mt-2"></div>

                    <div class="col-sm-4 mt-2"></div>
                    <div class="col-sm-4 mt-2">
                        <input type="submit" name="register" value="Register" class="form-control btn btn-success">
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-sm-4 mt-2"></div>
                <div class="col-sm-4 mt-2">
                    <i<h6 class="text-light">I already have an account <a href="Index.php" class="text-danger">Login</a> </h5>
                </div>
                <div class="col-sm-4 mt-2"></div>
            </div>
            
        </div>
    </div>
    
</body>    
</html>
<?php 
    if(isset($_POST["register"]))
    {
        $email=$_POST["email"];
        $password=$_POST["password"];
        $name=$_POST["name"];
        $department=$_POST["department"];
        $capacity=$_POST["desig"];
       
        $con=mysqli_connect('localhost','root','','school');
        $run1= mysqli_query($con, "SELECT * FROM `class` WHERE `building`='$building'");
        $row1= mysqli_num_rows($run1);
        if($row1<1)
        {
          $run=mysqli_query($con,"INSERT INTO `faculty`(`Name`, `Department` ,`Ranked`, `Email`, `Password`) VALUES ('$name','$department','0','$email','$password')");
          if($run)
          {
            ?>
              <script>
                alert('Register Added Successfully.');
              </script>
            <?php
            header("location:Index.php");
          }
          else
          {
            echo("Error description: " . $con -> error);
          }
        }
        else 
        {
          ?>
            <script>
                alert('Buildinf Already Available');
            </script>
          <?php
        }
    }
?>
 