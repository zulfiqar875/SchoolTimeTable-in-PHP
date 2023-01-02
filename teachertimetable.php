<?php
  session_start();
  $admin_id=$_SESSION["faculty_id"];
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
                <a class="navbar-brand text-light"  href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                      <a class="nav-link text-light" href="Classes_preference.php">Classes</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link text-light" href="teachertimetable.php">Time table</a>
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
            <h1>Available Timetable for Teacher</h1>

            <div class="dashboard p-4">
              <h3 class="text-center">Timeable</h3>
              <div class="row">
                    <?php
                    $con=mysqli_connect('localhost','root','','school');
                    $query="SELECT * FROM `time`";
                    $run=mysqli_query($con,$query);
                    $row=mysqli_num_rows($run);
                    $i=1;
                    $sum=0;
                    
                    while($data=mysqli_fetch_assoc($run))
                    { 
                      if($i == 1 || $i == 6 || $i == 11 || $i == 16 || $i == 21)
                      {
                        ?>
                          <div class="col-sm-2 p-2 bg-light text-dark">                   
                            <?php echo $data['Dayname'];  ?>
                          </div>
                          <div class="col-sm-2 p-2 bg-light text-dark">                   
                            <?php echo $data['Slot']; ?> <br>
                            <?php
                                  if($data['course'] == 2)
                                  {
                                    print ('(Mathematics)');
                                    echo nl2br("\nRoom: ".$data['room']);
                                  }
                                  else if($data['course'] == 3)
                                  {
                                    print ('(Computer-Science)');
                                    echo nl2br("\nRoom: ".$data['room']);
                                  }
                                  else if($data['course'] == 4)
                                  {
                                    print ('(English)');
                                    echo nl2br("\nRoom: ".$data['room']);
                                  }
                                  else if($data['course'] == 5)
                                  {
                                    print ('(Data Structure)');
                                    echo nl2br("\nRoom: ".$data['room']);
                                  }
                                  else if($data['course'] == 6)
                                  {
                                    print ('(Object Oriented Programming)');
                                    echo nl2br("\nRoom: ".$data['room']);
                                  }
                             ?>
                            
                          </div>
                        <?php
                        
                      }
                      else
                      { 
                        ?> 
                          <div class="col-sm-2 p-2 bg-light text-dark">                   
                            <?php echo $data['Slot']; ?> <br>
                            <?php 
                                  if($data['course'] == 2)
                                  {
                                    print ('(Mathematics)');
                                    echo nl2br("\nRoom: ".$data['room']);
                                  }
                                  else if($data['course'] == 3)
                                  {
                                    print ('(Computer-Science)');
                                    echo nl2br("\nRoom: ".$data['room']);
                                  }
                                  else if($data['course'] == 4)
                                  {
                                    print ('(English)');
                                    echo nl2br("\nRoom: ".$data['room']);
                                  }
                                  else if($data['course'] == 5)
                                  {
                                    print ('(Data Structure)');
                                    echo nl2br("\nRoom: ".$data['room']);
                                  }
                                  else if($data['course'] == 6)
                                  {
                                    print ('(Object Oriented Programming)');
                                    echo nl2br("\nRoom: ".$data['room']);
                                  }
                             ?>
                          </div>
                        <?php
                      }
                      $i++;
                      // print($i);
                    } ?> 
                  
                </div>
            </div>
        </div>
    </div>
    
</body>
    
</html>

