<?php 
  session_start();
  include('include/dbconnect.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Dashboard Template · Bootstrap v5.3</title>

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="assets/dist/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<?php 
  include_once('include/header.php'); 
?>

<div class="container-fluid">
  <div class="row">
    
<?php 
  include_once('include/sidebar.php'); 
?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
          </button>
        </div>
      </div>

      <h2>List User</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Full name</th>
              <th scope="col">Email</th>
              <th scope="col">Mobile number</th>
              <th scope="col">Register date</th>
            </tr>
          </thead>
          <tbody>
<?php  
    $ret=mysqli_query($con, "SELECT * FROM tbluser");
    $cnt=1;
    while ($row=mysqli_fetch_array($ret)) { 
?> 
            <tr>
              <td><?php echo $cnt; ?></td>
              <td><?php echo $row['FullName']; ?></td>
              <td><?php echo $row['Email']; ?></td>
              <td><?php echo $row['MobileNumber']; ?></td>
              <td><?php echo $row['RegDate']; ?></td>
            </tr>
<?php 
  $cnt++;  }
?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
