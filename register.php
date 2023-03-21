<?php
  include('include/dbconnect.php');

  $msg="";
  if(isset($_POST['submit'])){
    $fname  =$_POST['fullname'];
    $email  =$_POST['email'];
    $mobilenum  =$_POST['mobilenum'];
    $birthday  =$_POST['birthday'];
    $password  =$_POST['password'];

    $ret = mysqli_query($con,"SELECT 'Email' FROM 'tbluser' WHERE Email='$email' ");
    $return = mysqli_fetch_array($ret);
    if($return>0){
        $msg="Email đã tồn tại";
    }else{ 
      $query = mysqli_query($con, "INSERT INTO tbluser(FullName, Email, MobileNum, Birthday, Password) VALUE('$fname', '$email','$mobilenum','$birthday','$password')");
      if($query){ 
        $msg = "Đăng ký thành công"; 
      }else{
        $msg = "Đã có lỗi, hãy thử lại";
      }
    } 
  }
  
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Signin</title> 

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">  
    <link href="assets/dist/css/sign-in.css" rel="stylesheet">
    <script type="text/javascript">
      function checkpass() {
        if(document.signup.password.value!=document.signup.repeatpassword.value) {
          alert('Nhập mật khẩu không trùng khớp'); 
          document.signup.repeatpassword.focus();
          return false;
        }
        return true;
      }  
    </script>
  </head>
  <body class="text-center">
    
  <main class="form-signin w-100 m-auto">
    <form action="" method="post" name="signup" onsubmit="return checkpass();">
      <img class="mb-4" src="assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Signin here!</h1>
      <p style="font-size:16px; color:red; text-align:center; margin-bottom: 30px;"><?php echo $msg; ?></p>

      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInputT1" placeholder="Full Name" name="fullname" required="true">
        <label for="floatingInputT1">Full Name</label>
      </div>
      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required="true">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInputT2" placeholder="Mobile number" name="mobilenum">
        <label for="floatingInputT2">Mobile number</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInputT3" placeholder="Birthday" name="birthday">
        <label for="floatingInputT3">Birthday</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required="true">
        <label for="floatingPassword">Password</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPasswordRe" placeholder="Repeat Password" name="repeatpassword" required="true">
        <label for="floatingPasswordRe">Repeat Password</label>
      </div>
 
      <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
      <p><a href="index.php" title="">Login</a></p>
      <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
    </form>
  </main>
 
  </body>
</html>
