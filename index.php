<?php 
  session_start();
  if ($_SESSION['user']) {
    header ('Location: profile.php');
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
  <h1>Авторизация пользователя</h1>
  <div class="form__container">
  <form  class="form" action="auth.php" method="post">
    <span class="form__name">Логин</span>
    <input type="text" name="login" value="<?= $_SESSION["login"]?>">
    <span class="form__name">Пароль</span>
    <input type="password" name="password">
    <input class="login-button button" type="submit" value="Войти" >
    <span class="msg none">Lorem ipsum dolor sit amet.</span>
    <span class="success">Нет аккаунта? <a href="reg.php"> Зарегистрироваться </a></span>
  </form>
  </div>
  </div>
    <footer class="footer"></footer>
  </div>
  <script src="scripts/jquery-3.6.0.min.js"></script>
  <script src="scripts/script.js"></script>
</body>
</html>