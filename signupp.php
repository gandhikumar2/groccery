<!DOCTYPE html>
<html>
  <head>
    <title>signup form for groccery</title>
    <style media="screen">
      .one{
        text-align: center;
      }
      .one label{
        width: 150px;
        display: inline-block;
        text-align: left;
        color:red;
      }
      .one input{
        margin-top: 10px;
        border-radius: 5px;
      }
      body{
        background-image: url("http://api.ning.com/files/NfZBQ8g66NRNsL8JEL5RDsGxpA11Wj1o94szpEjVIdez92WgcAjP0SyYcXyyFG1Yovbwly3dERoSqpqjQ0P1N6ztQFt3UlHD/FreeBackgroundImagesCss.jpg");
      }
    </style>
  </head>
  <body>
    <?php
    require_once "dbutill.php";
    $error ="";
    $isError=false;
    $name = "";
    $username = "";
    $email = "";
    if(isset($_POST['signup'])){
      $name=trim($_POST['name']);
      $username=trim($_POST['username']);
      $email=trim($_POST['email']);
      $password=$_POST['password'];
      $confirmpassword=$_POST['confirmpassword'];
      if(empty($name)){
        $isError=true;
        $error=$error."<br>"."Name field is empty";
      }
      if(empty($username)){
        $isError=true;
        $error=$error."<br>"."Username field is empty";
      }
      if(!preg_match('/^[a-z0-9_-]{3,16}$/',$username)){
        $isError=true;
        $error=$error."<br>"."Username should contain only alphabets,numbers,- and_.should be 3 to 16 charecters long";
      }
      if(isUsernameExists($username)){
        $isError=true;
        $error = $error."<br>"."Username already exists.please try different one";
      }
      if(empty($email)){
        $isError=true;
        $error=$error."<br>"."Email field is empty";
      }
      if(!preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/',$email)){
        $isError=true;
        $error=$error."<br>"."Email is not valid";
      }
      if(isEmailExists($email)){
        $isError=true;
        $error = $error."<br>"."Emailid already exists.";
      }
      if(empty($password)){
        $isError=true;
        $error=$error."<br>"."Password field is empty";
      }
      if(empty($confirmpassword)){
        $isError=true;
        $error=$error."<br>"."Confirm password field is empty";
      }
      if($password <> $confirmpassword){
        $isError=true;
        $error=$error."<br>"."Oops! Password entered and confirmed doesn't match";
      }
      if(!$isError){
        $query = "insert into users (name,username,email,pwd)".
        "values ('$name','$username','$email',('$password'))";
        $result=executeQuery($query);
        echo "user with username".$username."has been created successfully";
      }
    }
    ?>
    <h1 class="one">CREATE AN GROCCERY ACCOUNT</h1>
    <form class="one" action="" method="post">
      <!--We show error here -->
      <p>
        <?php echo $error; ?>
      </p>
      <label for="name">Name:</label>
      <input type="text" name="name" value="<?php echo $isError ? $name : ""; ?>">
      <br>
      <label for="username">Username:</label>
      <input type="text" name="username" value="<?php echo $isError ? $username : ""; ?>">
      <br>
      <label for="email">Email:</label>
      <input type="text" name="email" value="<?php echo $isError ? $email : ""; ?>">
      <br>
      <label for="password">Password:</label>
      <input type="password" name="password" value="">
      <br>
      <label for="confirmpassword">Confirmpassword:</label>
      <input type="password" name="confirmpassword" value="">
      <br>
      <input type="submit" name="signup" value="create an account">
    </form>
  </body>
</html>
