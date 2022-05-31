<?php 
  session_start();
  if (!$_SESSION['user']) {
  header ('Location: index.php');
  }
  ?>
  <!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="main.css">
  <title>Authorization and Registration</title>
</head>
<body>
  <div class="wrapper">
  <div class="container">
  <h1>Добро пожаловать, <?=$_SESSION["user"]["login"]?></h1>
  <div  class="profile">
    <img src="<?=$_SESSION["user"]["avatar"]?>" width="300px" alt="">
    <p class="username"><?=$_SESSION["user"]["name"]?></p>
    <h2 class="user">Почтовый адрес: <?=$_SESSION["user"]["email"]?></h2>
    <p class="user">Дата регистрации: <?=$_SESSION["user"]["time"]?></p>
    <a href="logout.php">Выйти</a>
  </div>
  </div>
    <footer class="footer"></footer>
  </div>
  <script src="scripts/jquery-3.6.0.min.js"></script>
  <script src="scripts/script.js"></script>
</body>
</html>