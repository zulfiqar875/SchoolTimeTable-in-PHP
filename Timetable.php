<?php
  session_start();
  $admin_id=$_SESSION["student_id"];
  if(isset($admin_id))
  {

  }
  else{
      echo $admin_id;
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
    <title>Faculty</title>
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
                <a class="navbar-brand text-light"  href="student_page.php">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                      <a class="nav-link text-light" href="Course_preference.php">Courses</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-light" href="Timetable.php">Time Table</a>
                    </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                    <h5 class="text-light">
                      <?php 
                        $con=mysqli_connect('localhost','root','','school');
                        $query="SELECT * FROM `faculty` WHERE id = $admin_id";
                        $run=mysqli_query($con,$query);
                        $row=mysqli_num_rows($run);
                    
                        while($data=mysqli_fetch_assoc($run))
                        { 
                          echo $data['Name'];
                        } 
                      ?>
                    </h4>  
                    <a href="logout.php" class="btn btn-outline-light my-2 my-sm-0 text-light" type="button">Logout</a>
                  </form>
                </div>
              </nav>
        </div>
        <hr>
        <div class="login mt-5  pt-5ml-5 mr-5 text-center text-light" style="height: 380px">
            <h1>Welecome</h1>

            <div class="dashboard p-4">
              <h3 class="text-center">Timeable</h3>
              <table class="table">
                    <thead class="bg-light">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Day</th>
                        <th scope="col">Room No.</th>
                        </tr>
                    </thead>
                    <tbody class="text-light">
                            <?php
                            $con=mysqli_connect('localhost','root','','school');
                            $query="SELECT * FROM `schedule`";
                            $run=mysqli_query($con,$query);
                            $row=mysqli_num_rows($run);
                            $i=1;
                            $sum=0;
                            while($data=mysqli_fetch_assoc($run))
                            {  
                                ?>
                                <tr>
                                <td><?php echo $i++;?></td>
                                <td><?php
                                  if($data['Course'] == 2)
                                  {
                                    print ('Mathematics');
                                  }
                                  else if($data['Course'] == 3)
                                  {
                                    print ('Computer-Science');
                                  }
                                  else if($data['Course'] == 4)
                                  {
                                    print ('(English)');
                                  }
                                  else if($data['Course'] == 5)
                                  {
                                    print ('Data Structure');
                                  }
                                  else if($data['Course'] == 6)
                                  {
                                    print ('Object Oriented Programming');
                                  }
                             ?> </td>
                                <td><?php echo $data['Day'];?> </td>
                                <td><?php echo $data['Room'];?> </td>
                                </tr>
                                <?php
                            } ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>
    
</html>

