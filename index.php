<?php 
include('config.php');
if(isset($_POST['submit']))
  {
    $uname=$_POST['userName'];
    $firstName= $_POST['firstName'];
    $lastName= $_POST['lastName'];
    $contno=$_POST['contactno'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $ret=mysqli_query($con, "select Email from tbluser where Email='$email' || MobileNumber='$contno'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
    echo "<script>alert('This email or Contact Number already associated with another account');</script>";
    }
    else{
    $query=mysqli_query($con, "insert into tbluser(Username, FirstName, LastName, MobileNumber, Email, Password) value('$uname', '$firstName', '$lastName', '$contno', '$email', '$password' )");
    if ($query) {
    echo "<script>alert('You have successfully registered');</script>";
    echo "<script>window.location.href ='signin.php'</script>";
    }
    else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
       echo "<script>window.location.href ='index.php'</script>";
    }
}
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Sign Up Page</title>
 </head>
    <h2 class="title">Registration Form</h2>
     <form method="POST">
        Username:  <input class="input--style-1" type="text" placeholder="UserName" name="userName" required="true"><br/><br/>
        First Name<input class="input--style-1" type="text" placeholder="FirstName" name="firstName" required="true"><br/><br/>
        Last Name  <input class="input--style-1" type="text" placeholder="LastName" name="lastName" required="true"><br/><br/>
        Mobile Number <input class="input--style-1" type="text" placeholder="MobileNumber" name="contactno" required="true" maxlength="10" pattern="[0-9]+"> <br/><br/>
        Email Address  <input class="input--style-1" type="email" placeholder="EmailAddress" name="email" required="true"> <br/><br/>
        Password   <input type="password" value="" class="input--style-1" name="password" required="true" placeholder="Password"><br/><br/>
           <button class="btn btn--radius btn--green" type="submit" name="submit">Submit</button><br/>
                <a href="signin.php" style="color: red">Already have an account? Signin</a><br/>
      </form>
  
</body>

</html>

