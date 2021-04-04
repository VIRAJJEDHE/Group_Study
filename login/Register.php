<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Signin Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form method='POST'>
    <img class="mb-4" src="../assets_V2/logo.png" alt="" width="300" height="150">
    <h1 class="h3 mb-3 fw-normal">Create New Account</h1>
      <input type="text" name="Fname" class="form-control mb-2" id="floatingInput" placeholder="First Name">
      <input type="text" name="Lname" class="form-control mb-2" id="floatingInput" placeholder="Last Name">
      <input type="text" name="Username"class="form-control mb-2" id="floatingInput" placeholder="Username">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Create</button>
      <p class="mt-5 mb-3 text-muted">&copy; <strong>Noob_Coders404</strong></p>
  </form>
</main>

<?php
  if(isset($_POST["submit"])){
    $fname=$_POST['Fname'];
    $lname=$_POST['Lname'];
    $user=$_POST['Username'];
    $pass=$_POST['password'];

    include("config.php");

    $query=mysqli_query($db,"SELECT * FROM user WHERE UserName='".$user."'");
    $numrows=mysqli_num_rows($query);
    if($numrows==0)
      {  
        $sql="INSERT INTO user (FirstName,LastName,UserName,Password) VALUES('$fname','$lname','$user','$pass')";  
        
        $result=mysqli_query($db,$sql); 

        if($result){  
          header('location: index.php');
        }
      } 
  }
?>

    
  </body>
</html>
