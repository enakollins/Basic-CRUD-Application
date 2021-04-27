<?php 
//Database Connection
session_start();
error_reporting(0);
include('config.php');
if (strlen($_SESSION['uid']==0)) {
  header('location:logout.php');
  }
if(isset($_POST['submit']))
  {
  	$eid=$_GET['editid'];
  	//Getting Post Values
    $ccode=$_POST['ccode'];
    $ctitle=$_POST['ctitle'];
   
    //Query for data updation
     $query=mysqli_query($con, "update  tblusers set Coursecode='$ccode', CourseTitle='$ctitle' where ID='$eid'");
     
    if ($query) {
    echo "<script>alert('You have successfully update the data');</script>";
    echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>PHP Crud Operation!!</title>

    <form  method="POST">
 <?php
$eid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblusers where ID='$eid'");
while ($row=mysqli_fetch_array($ret)) {
?>
		<h2>Update </h2>
		<p class="hint-text">Update your info.</p>
        <div class="form-group">
		<div class="row">
				<div class="col"><input type="text" class="form-control" name="ccode" placeholder="Course Code" required="true"></div>
				<div class="col"><input type="text" class="form-control" name="ctitle" placeholder="Course Title" required="true"></div>
			</div> <br/> 
      <?php 
}?>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
        </div>
    </form>

</div>
</body>
</html>