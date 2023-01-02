<?php 
    session_start();
    $admin_id=$_SESSION["admin_id"];
    $faculty_id=$_SESSION["faculty_id"];
    // $Padmin_id=$_SESSION["Padmin_id"];
    if((isset($faculty_id)) OR (isset($admin_id)))
    {
        session_destroy();
        header("location:Index.php");
    }
    else
    {
        header("location:Index.php");
        exit();
    }

 ?>