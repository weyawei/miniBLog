<?php
  session_start(); 
  require 'connect.php';

  date_default_timezone_set("Asia/Manila");

  if (isset($_POST['login'])){
    if (isset($_POST['email']) && isset($_POST['password'])) {
      
      function validate($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
        return $data;
      }

      $email = validate($_POST['email']);
      $password = validate($_POST['password']);

      if (empty($email)) {

        header("Location: login.php?error=Email is required");
        exit();
      }else if(empty($password)){

        header("Location: login.php?error=Password is required");
        exit();
      } else {

        $sql = "SELECT * FROM user_details WHERE email='$email' AND password='$password'";

        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) === 1) {

          $row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $password) {
              
              $_SESSION['user_name'] = $row['username'];
              $_SESSION['email'] = $row['email'];
              $_SESSION['id'] = $row['id'];
              header("Location: home.php");
              exit();
            } else {
              header("Location: login.php?error=Incorect Email or Password");
              exit();
            }
        } else {
          header("Location: index.php?error=Incorect Email or Password");
          exit();
        }
      }
      
    } 
  }

  if (isset($_POST['register'])){

    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['conpassword'])) {
      function validate($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
        return $data;
      }

      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $conpassword = $_POST['conpassword'];

      if (empty($username)) {

        header("Location: registration.php?error=User Name is required");
        exit();
      }else if(empty($email)){

        header("Location: registration.php?error=Email is required");
        exit();
      }else if(empty($password)){

        header("Location: registration.php?error=Password is required");
        exit();
      }else if(empty($conpassword)){

        header("Location: registration.php?error=Confirmation Password is required");
        exit();
      }else if($password != $conpassword){

        header("Location: registration.php?error=Password doesn't match");
        exit();
      } else {
          $sql = "insert into `user_details` (username, email, password) values('$username', '$email', '$password')";
          $result = mysqli_query($con, $sql);

          if ($result){
            header("Location: registration.php?success=Data inserted successfully");
          } else {
            echo "error";
            die(mysql_error());
          }
      }
    }

  }

  if (isset($_POST['createPOST'])){

    $title = $_POST['title'];
    $content = $_POST['content'];
    $dateTime = date('Y-m-d H:i:s');
    $user_id = $_SESSION['id'];


    $sql = "insert into `post_details` (title, content, date_post, user_id) values('$title', '$content', '$dateTime', '$user_id')";
    $result = mysqli_query($con, $sql);

    if ($result){
      header("Location: create.php?success=Data inserted successfully");
    } else {
      echo "error";
      die(mysql_error());
    }

  }

  if (isset($_POST['editPOST'])){
    $post_id = $_POST['post_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $dateTime = date('Y-m-d H:i:s');
    $user_id = $_SESSION['id'];

    $sql = "UPDATE post_details SET title='$title', content='$content', date_post='$dateTime', user_id='$user_id' WHERE id='$post_id' ";
    $result = mysqli_query($con, $sql);

    if ($result){
      header("Location: home.php?success=Data updated successfully");
    } else {
      echo "error";
      die(mysql_error());
    }

  }

  if (isset($_GET['deleteid'])){

    $id = $_GET['deleteid'];

    $sql = "DELETE FROM `post_details` WHERE id=$id";
    $result = mysqli_query($con, $sql);

    if ($result){
      echo "Data deleted successfully";
      //header('location:home.php')
    } else {
      echo "error";
      die(mysql_error());
    }

  }

?>