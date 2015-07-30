<!DOCTYPE html>
<html>
  <head>
    <title>Groccery login</title>
    <style media="screen">
      .align{
        text-align: center;
        color: white;
      }
      body{
        background-image: url("http://bestinspired.com/wp-content/uploads/2015/06/beautiful-wallpapers1.jpg");
      }
      .align label{
        width: 80px;
        display: inline-block;
        color: white;
      }
      .align input{
      margin-top: 10px;
      border-radius: 5px;
      }
    </style>
  </head>
  <body>
    <?php
    require_once "dbutill.php";
    $error = "";
    if(isset($_POST['login'])){
      $gotUsername = trim($_POST['username']);
      $gotPwd = $_POST['password'];
      if(isValidCredentials($gotUsername,$gotPwd)){
        //session_start();
        //$_SESSION['username'] = $gotUsername;
        setcookie ('username',$gotUsername);
        $userId = getUserId($gotUsername);;
        setcookie ('userId',($userId));
        //$_SESSION['userId'] = $userId;
        echo "logged in successfully";
        header("location:app1.php");
      }
      else{
        $error = "Invalid credentials.Please try again";
      }
    }
     ?>
    <h1 class="align">LOGIN GROCCERY LIST</h1>
    <form class="align" action="" method="post">
      <label for="username">Username:</label>
      <input type="text" name="username" value="">
      <br>
      <label for="password">Pwd:</label>
      <input type="password" name="password" value="">
      <br>
      <input type="submit" name="login" value="login">
    </form>
  </body>
</html>
