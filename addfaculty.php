<?php
  session_start();
  $admin_id=$_SESSION["admin_id"];
  if(isset($admin_id))
  {

  }
  else{
      header("location:login.php");
      exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Admin</title>
</head>
<style>
    body
    {
        background-image: url('https://img.freepik.com/free-vector/high-school-concept-illustration_114360-8279.jpg?w=2000');
        background-position:center;
        background-repeat: no-repeat;
      
    }
    .main
    {
        background-color: rgba(21, 85, 55, 0.571);
    }
</style>
<body>
    <div class="main m-5">
        <div class="header text-center">
            <nav class="navbar navbar-expand-lg" style=" background-color: rgba(21, 85, 55, 0.523);">
                <a class="navbar-brand text-light"  href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link text-light" href="addfaculty.php">Faculty <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-light" href="addclasses.php">Classes</a>
                    </li>
                    
                    <li class="nav-item">
                      <a class="nav-link text-light" href="addcorses.php">Courses</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-light" href="admintime.php">Time Table</a>
                    </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                   
                  <a href="logout.php" class="btn btn-outline-light my-2 my-sm-0 text-light" type="button">Logout</a>
                  </form>
                </div>
              </nav>
        </div>
        <hr>
        <div class="login mt-5  pt-5ml-5 mr-5 p-5 text-light" >
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Add New Faculty
            </button>

            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title text-dark" id="exampleModalLongTitle">Add new Faculty</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-12 mt-2">
                                    <input type="text" value="" required name="name" placeholder="Enter Faculty Member Name" class="form-control">
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <input type="text" value="" required name="department" placeholder="Enter Department Name" class="form-control">
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <input type="text" value="" required name="designation" placeholder="Enter Designation Name" class="form-control">
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <input type="email" value="" required name="email" placeholder="Enter Email" class="form-control">
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <input type="text" value="" required name="password" placeholder="Enter Password" class="form-control">
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <input type="submit" value="Add Faculty" name="addfaculty" class="form-control btn btn-primary">
                                </div>
                            </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>
                     
                    </div>
                  </div>
                </div>
              </div>
              <?php 
                $con=mysqli_connect('localhost','root','','school');
                $query="SELECT * FROM `faculty`";
                $run=mysqli_query($con,$query);
                $row=mysqli_num_rows($run);
                
                // if($row>=1)
                // {
                  ?>
                  <table class="table text-light">
                    <thead class="bg-success">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Professor</th>
                        <th scope="col">Department</th>
                        <th scope="col">Designation</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                        <?php
                          $i=1;
                          $sum=0;
                          while($data=mysqli_fetch_assoc($run))
                          {  
                            ?>
                            <tr>
                              <td><?php echo $i++;?></td>
                              <td><?php echo $data['Name'];?> </td>
                              <td><?php echo $data['Department'];?> </td>
                              <td><?php echo $data['Designation'];?> </td>
                              </tr>
                            <?php
                          } ?>
                     
                    </tbody>
                  </table>
                  
                <!-- }  -->
        </div>
    </div>
    
</body>
    
</html>

<?php 
    if(isset($_POST["addfaculty"]))
    {
        $name=$_POST["name"];
        $department=$_POST["department"];
        $designation=$_POST["designation"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $con=mysqli_connect('localhost','root','','school');
        $run1= mysqli_query($con, "SELECT * FROM `faculty` WHERE `Email`='$email'");
        $row1= mysqli_num_rows($run1);
        if($row1<1)
        {
          $run=mysqli_query($con,"INSERT INTO `faculty`(`Name`, `Department`, `Designation`, `Email`, `Password`) VALUES ('$name','$department','$designation', '$email', '$password')");
          if($run)
          {
            ?>
              <script>
                alert('Faculty Member Added Successfully.');
              </script>
            <?php
            // header("location:admin_page.php");
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
                alert('Faculty Member Already Available');
            </script>
          <?php
        }
        
    }
?>