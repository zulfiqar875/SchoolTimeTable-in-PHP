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
                Add New Class
            </button>

            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title text-dark" id="exampleModalLongTitle">Add New Class</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-12 mt-2">
                                    <input type="text" value="" name="building" placeholder="Enter Building Name" class="form-control">
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <input type="text" value="" name="room" placeholder="Enter Room Number" class="form-control">
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <input type="text" value="" name="capacity" placeholder="Enter Capacity Number" class="form-control">
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <select name="multimedia" id="" class="form-control">
                                        <option value="yes">Multimedia required - Yes</option>
                                        <option value="No">Multimedia required - No</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <input type="submit" value="Add Course" name="addclass" class="form-control btn btn-primary">
                                </div>
                            </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     
                    </div>
                  </div>
                </div>
              </div>

              <?php 
                $con=mysqli_connect('localhost','root','','school');
                $query="SELECT * FROM `class`";
                $run=mysqli_query($con,$query);
                $row=mysqli_num_rows($run);
                
                // if($row>=1)
                // {
                  ?>
                  <table class="table text-light">
                    <thead class="bg-success">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Block</th>
                        <th scope="col">Room</th>
                        <th scope="col">Capacity</th>
                        <th scope="col">Multimedia</th>
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
                              <td><?php echo $data['building'];?> </td>
                              <td><?php echo $data['room'];?> </td>
                              <td><?php echo $data['capacity'];?> </td>
                              <td><?php echo $data['multimedia'];?> </td>
                              </tr>
                            <?php
                          } ?>
                     
                    </tbody>
                  </table>
        </div>
    </div>
    
</body>
    
</html>

<?php 
    if(isset($_POST["addclass"]))
    {
        $building=$_POST["building"];
        $room=$_POST["room"];
        $capacity=$_POST["capacity"];
        $multimedia=$_POST["multimedia"];
       
        $con=mysqli_connect('localhost','root','','school');
        $run1= mysqli_query($con, "SELECT * FROM `class` WHERE `building`='$building'");
        $row1= mysqli_num_rows($run1);
        if($row1<1)
        {
          $run=mysqli_query($con,"INSERT INTO `class`(`building`, `room` ,`capacity`, `multimedia`) VALUES ('$building','$room','$capacity','$multimedia')");
          if($run)
          {
            ?>
              <script>
                alert('Building Added Successfully.');
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
                alert('Buildinf Already Available');
            </script>
          <?php
        }
        
    }
?>