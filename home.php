<?php
  session_start();
  include 'connect.php';

  if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
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
    <a href="logout.php">Logout</a>
    <a href="home.php">Home</a>
    <a href="">Hi <?php echo $_SESSION['user_name'] ?> !</a>
  </div>

  <!-- HOME Page -->
  <div class="postdetails container">
    <div class="header mt-3 ps-3">
        <?php
          if (isset($_GET['error'])){
            echo '<p class="error">'.$_GET['error'].'</p>';
          } elseif (isset($_GET['success'])) {
            echo '<p class="success">'.$_GET['success'].'</p>';
          }
        ?>
    </div>
          <?php
            $user_id = $_SESSION['id'];
            $sql = "select * from post_details WHERE user_id = '$user_id'";
            $result = mysqli_query($con, $sql);

            if ($result) {
              while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $title = $row['title'];
                $content = $row['content'];
                $date_post = $row['date_post'];
                $user_id = $row['user_id'];

                $date_post = date("jS \of F Y h:i:s A", strtotime($date_post));

                echo '<div class="postdetails shadow-lg p-3 mb-3 bg-body">
                      <h3>'.$title.'</h3>
                      <p>'.$content.'</p>
                      <p>Date: '.$date_post.'</p>
                      <a class="text-light btn btn-danger" href="code.php?deleteid='.$id.'">DELETE</a>
                      <a class="text-light btn btn-success" href="edit.php?editid='.$id.'">EDIT</a>
                    </div>';
              }
            }
          ?>
      <div class="border mt-3 shadow-lg bg-body">
        <a href="create.php" class="btn btn-primary mt-3 ms-3 mb-3">CREATE NEW POST</a>
      </div>
    </div>
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>

<?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>