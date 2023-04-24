<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- css design -->
    <link rel="stylesheet" type="text/css" href="./style.css">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">

    <title>Mini Blog</title>
  </head>
  <body>
  
  <!-- Navigation Bar -->
  <div class="topnav">
    <a class="split">MiniBlog</a>
    <a href="index.php">Login</a>
  </div>

  <!-- Registration Page -->
  <h4 class="mt-2">Registration</h4>

  <div class="forms container border mt-3 shadow mb-5 bg-body">
    <div class="header mt-3 ps-3">
       <h5 class="input-color">See the Registrartion Rules</h5>
        <?php
          if (isset($_GET['error'])){
            echo '<p class="error">'.$_GET['error'].'</p>';
          } elseif (isset($_GET['success'])) {
            echo '<p class="success">'.$_GET['success'].'</p>';
          }
        ?>
    </div>

    <form action="code.php" method="post">
      <input type="text" class="form-control textbox mt-3 ms-3" id="exampleFormControlInput1" name="username" placeholder="Enter Username">
      <input type="email" class="form-control textbox mt-3 ms-3" id="exampleFormControlInput1" name="email" placeholder="Enter Email">
      <input type="password" class="form-control textbox mt-3 ms-3" id="exampleFormControlInput1" name="password" placeholder="Enter Password">
      <input type="password" class="form-control textbox mt-3 ms-3" id="exampleFormControlInput1" name="conpassword" placeholder="Confirm Password">

      <button class="btn btn-success ms-3 my-3" type="submit" name="register">REGISTER</button>
      <p class="ms-3">Return to the <a id="loginPage" href="login.php">LOGIN PAGE</a></p>
    </form>
  </div>
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
