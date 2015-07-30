<!DOCTYPE html>
<html>
  <head>
    <title>home @ groccerylist</title>
    <style media="screen">
    body{
      background-image: url("http://images2.fanpop.com/image/photos/12000000/Beautiful-Wallpapers-lilyz-12091921-1920-1200.jpg");
    }
      .edit{
        text-align: center;
        color: white;
        background: #FF3333;
        width: 33%;
        height: 30px;
        padding-top: 20px;
        float: left;
      }
      .log{
        border: solid 1px grey;
        width: 33%;
        height: 30px;
        /*padding-top: 20px;*/
        /*float: left;*/
        background: #FF3333;
        color: white;
        text-align: center;
        text-decoration: none;
      }
      .task{
        text-align: center;
      }
      .task input{
        border-radius: 10px;
        padding: 10px 40px 10px 40px;
        text-align: center;
      }
      input .task1{
        text-align: center;
        border-radius: 10px;
      }
    </style>
  </head>
  <body>
    <?php
    if(!isset($_COOKIE['userId']) || !isset($_COOKIE['username'])){
      header("location:/loginn.php");
      exit();
    }else{
     ?>
    <div>
      <p class="edit">
        GROCCERY LIST
      </p>
    </div>
    <div>
      <p class="edit">
        welcome to <?php echo $_COOKIE ['username']; ?>
      </p>
    </div
    <div>
      <p class="edit">
        <a class="log" href="logoutt.php">log out</a>
      </p>
    </div>
    <form class="task" action="" method="post">
      <input type="text" name="grocceryname" value="" placeholder="Groccery Name">
      <input type="text" name="qty" value="" placeholder="Qty">
      <input type="text" name="amount" value="" placeholder="Amount">
      <input class=task1 type="submit" name="submit" value="SUBMIT">
    </form>
    <?php
  }
     ?>
  </body>
</html>
