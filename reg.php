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
  <h1>Введите данные для регистрации</h1>
  <div class="form__container">
  <form  class="form">
  <label class="form__name">Имя</label>
    <input type="text" name="name" placeholder="Имя будет видно в вашем профиле">
    <label class="form__name">Логин</label>
    <input type="text" name="login" placeholder="Введите ваш логин">
    <label class="form__name">Пароль</label>
    <input type="password" name="password" placeholder="Введите пароль не менее 5 символов">
    <label class="form__name">Подтвердите пароль</label>
    <input type="password" name="password_confirm" placeholder="Повторите пароль для проверки">
    <label class="form__name">Почта</label>
    <input type="email" name="email" placeholder="Введите почтовый адрес @">
    <label class="form__name">Загрузите картинку профиля</label>
    <input class ="form__file" type="file" name="avatar">
    <span class="msg none">Lorem ipsum dolor sit amet.</span>
    <input class="register-button button" type="submit" value="Зарегистрироваться" >
    <span class="success">Есть аккаунт? <a href="index.php"> Войти </a></span>
  </form>
  </div>
  </div>
    <footer class="footer"></footer>
  </div>
  <script src="scripts/jquery-3.6.0.min.js"></script>
  <script src="scripts/script.js"></script>
</body>
</html>