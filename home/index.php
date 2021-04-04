<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Fixed top navbar example · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-fixed/">

    

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
    <link href="navbar-top-fixed.css" rel="stylesheet">
  </head>
  <body>
    
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand " href="#">Welcome to Group study, <?php echo $_SESSION['login_name'] ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Select a Room to Start Studying </a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<main class="container">
  <div class="row">
    <div class="col-8 ">
      <div class="list-group-item mb-4 bg-primary text-white py-4" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Join Room<button type="button" class="btn btn-danger float-end">Join</button><input  class="float-end py-1" type="text" placeholder="Enter room code"></span></div>
      <div class="list-group-item mb-4 bg-primary text-white py-4" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Create New Room <a href="create_room.php" class="btn btn-danger float-end py--2 ">Create</a></div>
       
      <?php
        include("config.php");
        $result=mysqli_query($db,"SELECT * FROM room ");
        while($row=mysqli_fetch_array($result)){
          $id=$row['roomid'];
          $name=$row['roomname'];
          echo '<div class="list-group " id="list-tab" role="tablist">
          <p class="list-group-item list-group-item-action mb-4 bg-secondary text-white" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">'.$row["roomname"].'
          <a href="../room/index.php?id='.$id.'?name='.$name.'" value="'.$id.'" type="submit" class="btn btn-danger float-end">Join</a>  </p>
          </div>';
        }
      ?>
    </div>
    <div class="col-8">
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade" id="list-home" role="tabpanel" aria-labelledby="list-home-list">...</div>
        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">...</div>
        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
        <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
      </div>
    </div>
  </div>
</main>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
