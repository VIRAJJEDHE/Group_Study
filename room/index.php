<?php
 
session_start();
if(isset($_GET['logout'])){    
     
     //Simple exit message
     $logout_message = "<div class='msgln'><span class='left-info'>User <b class='user-name-left'>". $_SESSION['name'] ."</b> has left the chat session.</span><br></div>";
     file_put_contents("log.html", $logout_message, FILE_APPEND | LOCK_EX);
      
     session_destroy();
     header("Location: index.php"); //Redirect the user
 }
  
 if(isset($_POST['enter'])){
     if($_POST['name'] != ""){
         $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
     }
     else{
         echo '<span class="error">Please type in a name</span>';
     }
 }
  
 function loginForm(){
     echo
     '<div id="loginform">
     <p>Please enter your name to continue!</p>
     <form action="index.php" method="post">
       <label for="name">Name &mdash;</label>
       <input type="text" name="name" id="name" />
       <input type="submit" name="enter" id="enter" value="Enter" />
     </form>
   </div>';
 }
  
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Offcanvas navbar template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/offcanvas-navbar/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="chat.css" rel="stylesheet">
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
    <link href="offcanvas.css" rel="stylesheet">
  </head>
<body class="bg-light">
    
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary" aria-label="Main navigation">
  <div class="container-fluid">
  <?php
    include("config.php");
    $id = intval($_GET['id']);
    $name=intval($_GET['id']);
    $result=mysqli_query($db,"SELECT * FROM room WHERE roomid='".$id."'");
    while($row=mysqli_fetch_array($result)){
        echo'
    <a class="navbar-brand " href="#">'.$row['roomname'].'</a>';
}
?>
    <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="offcanvas" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

<div class="nav-scroller bg-body shadow-lg">
  <nav class="nav nav-underline " aria-label="Secondary navigation">
    <a class="nav-link" href="#">Chat</a>
    <a class="nav-link" href="#">Previos Year Papers</a>
    <a class="nav-link" href="#">Tips</a>
    <a class="nav-link" href="#">Questions</a>
    <a class="nav-link" href="#"><button class="btn-group btn-group-sm btn-danger">Video Conference</button></a>
  </nav>
</div>

<?php
    if(!isset($_SESSION['name'])){
      loginform();
    }
    else {
?>
<div id="wrapper">
            <div id="menu">
                <p class="welcome">Welcome, <b><?php echo $_SESSION['name']; ?></b></p>
                <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
            </div>

<div id="chatbox">
<?php
$name=intval($_GET['id']);
  if(file_exists("log.html") && filesize("log.html") > 0){
    $contents = file_get_contents("log.html");          
    echo $contents;
    }
  ?>
</div>



<form name="message" action="">
  <input name="usermsg" type="text" id="usermsg" />
  <input name="submitmsg" type="submit" id="submitmsg" value="Send" />
</form>

  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="offcanvas.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            // jQuery Document
            $(document).ready(function () {
                $("#submitmsg").click(function () {
                    var clientmsg = $("#usermsg").val();
                    $.post("post.php", { text: clientmsg });
                    $("#usermsg").val("");
                    return false;
                });
 
                function loadLog() {
                    var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height before the request
 
                    $.ajax({
                        url: "log.html",
                        cache: false,
                        success: function (html) {
                            $("#chatbox").html(html); //Insert chat log into the #chatbox div
 
                            //Auto-scroll           
                            var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height after the request
                            if(newscrollHeight > oldscrollHeight){
                                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
                            }   
                        }
                    });
                }
 
                setInterval (loadLog, 2500);
 
                $("#exit").click(function () {
                    var exit = confirm("Are you sure you want to end the session?");
                    if (exit == true) {
                    window.location = "index.php?logout=true";
                    }
                });
            });
        </script>
</body>
</html>
<?php
}
?>