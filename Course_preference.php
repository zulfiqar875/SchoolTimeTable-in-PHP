<?php
  session_start();
  $admin_id=$_SESSION["student_id"];
  $myranked=$_SESSION["ranked"];
  // echo $ranked;
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
  <title>Login</title>
</head>
<style>
  body {
    background-image: url('https://img.freepik.com/free-vector/high-school-concept-illustration_114360-8279.jpg?w=2000');
    background-position: center;
    background-repeat: no-repeat;

  }

  .main {
    background-color: rgba(21, 85, 55, 0.571);
  }

  #monday,
  #tuesday,
  #wednesday,
  #thursday,
  #friday {
    visibility: hidden;
  }
</style>

<body>
  <div class="main m-5">
    <div class="header text-center">
      <nav class="navbar navbar-expand-lg" style=" background-color: rgba(21, 85, 55, 0.523);">
        <a class="navbar-brand text-light" href="student_page.php">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link text-light" href="Course_preference.php">Classes</a>
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

            <a href="logout.php" class="btn btn-outline-light my-2 my-sm-0 text-light" type="button">
            Logout</a>
          </form>
        </div>
      </nav>
    </div>
    <hr>
    <div class="login mt-5  pt-5ml-5 mr-5 p-5 text-light">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Register New Course</button>

      <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-dark" id="exampleModalLongTitle">Add New Class</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="post" class="Business_Type">
                <div class="row">
                    <input type="hidden" value="<?php echo $_SESSION["student_id"];?>" name="sid">
                    <input type="hidden" value="<?php echo $_SESSION["ranked"];?>" name="ranked">
                    <div class="col-sm-6 mt-2">
                        <select name="course" required id="" class="form-control">
                        <option value="" disabled selected > -- Select Course --</option>
                            <?php 
                                $con=mysqli_connect('localhost','root','','school');
                                $query="SELECT * FROM `courseoffer`";
                                $run=mysqli_query($con,$query);
                                $row=mysqli_num_rows($run);
                                while($data=mysqli_fetch_assoc($run))
                                {  ?>
                                            <option value="<?php echo $data['cfid'];?>">
                                            <?php echo $data['coursename'];?> -
                                            <?php echo $data['facultyid'];?>
                                            </option>
                                        <?php    
                                } ?>

                        </select>
                    </div>

                  

                  <div class="col-sm-12 mt-2">
                    <input type="submit" value="Add Course" name="course_pref" class="form-control btn btn-primary">
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
    </div>
    <table class="table">
      <thead class="text-dark bg-light">
        <tr>
          <th scope="col">Sr. No</th>
          <th scope="col">Course Name</th>
          <th scope="col">Teacher Name</th>
        </tr>
      </thead>
      <tbody class="text-light">
        <?php
          $con=mysqli_connect('localhost','root','','school');
          $query="SELECT * FROM `courserigration`";
          $run=mysqli_query($con,$query);
          $row=mysqli_num_rows($run);
          $i=1;
          $sum=0;
          while($data=mysqli_fetch_assoc($run))
          {  
            ?>
            <tr>
              <td><?php echo $i++;?></td>
              <td><?php echo $data['cname'];?> </td>
              <td><?php echo $data['tname'];?> </td>
              </tr>
            <?php
          } ?> 
      </tbody>
    </table>
  </div>
</body>

</html>

<script>
  function getresult() 
  {
    var fieldContainer_Business_Type = document.getElementsByClassName('Business_Type')[0];
    var radios_Business_Type = fieldContainer_Business_Type.getElementsByTagName("input");
    var Business_Type;

    

    function businessType() {

        for (var i = 0; i < radios_Business_Type.length; i++) {
            alert(radios_Business_Type)
            if (radios_Business_Type[i].type === 'radio' && radios_Business_Type[i].checked) {
                Business_Type = radios_Business_Type[i].value;
                
                console.log(Business_Type);
            }
        }
    }

    for (var i = 0; i < radios_Business_Type.length; i++) {
        radios_Business_Type[i].addEventListener('click', businessType);
    }
  }
</script>

<?php 
    if(isset($_POST["course_pref"]))
    {
        $con=mysqli_connect('localhost','root','','school');

        $sid=$_POST["sid"];
        $query= "SELECT * FROM `faculty` WHERE `id`= '$sid'";
        $run= mysqli_query($con, $query);
        $row=mysqli_num_rows($run);
        $data=mysqli_fetch_assoc($run);
        $studentname = $data['Name'];

        $ranked=$_POST["ranked"];

        $courseid=$_POST["course"];
        $query= "SELECT * FROM `courseoffer` WHERE `cfid`='$courseid'";
        $run=mysqli_query($con,$query);
        $row=mysqli_num_rows($run);
        $data=mysqli_fetch_assoc($run);

        $coursename = $data['coursename'];
        $teachername = $data['facultyid'];

        $query= "SELECT * FROM `course` WHERE `course`='$coursename'";
        $run=mysqli_query($con,$query);
        $row=mysqli_num_rows($run);
        $data=mysqli_fetch_assoc($run);

        $ccid = $data['id'];
        $enr = $data['enrollment'] - 1;

        $query= "SELECT * FROM `faculty` WHERE `Name`='$teachername'";
        $run=mysqli_query($con,$query);
        $row=mysqli_num_rows($run);
        $data=mysqli_fetch_assoc($run);
        $fid = $data['id'];
        // echo"$fid,  $sid, $ccid, 'student', $teachername, $coursename";
        $run=mysqli_query($con,"UPDATE course SET enrollment=$enr  WHERE `id`='$ccid'");
        $run=mysqli_query($con,"INSERT INTO courserigration (uid, fid, cid, tname, sname, cname) VALUES ($sid,  $fid, $ccid, '-', '-', '-')");
        
        $query= "SELECT * FROM courserigration ORDER BY rid DESC LIMIT 1";
        $run=mysqli_query($con,$query);
        $row=mysqli_num_rows($run);
        $data=mysqli_fetch_assoc($run);
        $rid = $data['rid'];
        // select *from getLastRecord ORDER BY id DESC LIMIT 1;
        // print($rid);
        $run=mysqli_query($con,"UPDATE courserigration SET tname=' $teachername', sname= '$studentname', cname= '$coursename'  WHERE `rid`='$rid'");

        
          // 
        if($run)
        {
          ?>
            <script>
              alert('Course Preferenecs Added Successfully.');
            </script>
          <?php
          // header("location:admin_page.php");
        }
        else
        {
          echo("Error description: " . $con -> error);
        }
        
        
    }
?>