<?php
session_start();

$login = htmlspecialchars(trim($_POST["login"]));
$password = htmlspecialchars(trim($_POST["password"]));

$error_fields = [];

if ($login === '') {
  $error_fields[] = 'login';
}

if ($password === '') {
  $error_fields[] = 'password';
}

if (!empty($error_fields)) {
  $responce = [
    "status" => false,
    "type" => 1,
    "message" => "Вы не ввели логин или пароль",
    "fields" => $error_fields
  ];
  echo json_encode($responce);
  die();
}

$password = md5($password);

$mysql =  new mysqli("localhost", "mysql", "mysql", "register");
$checkauth = $mysql->query("SELECT * FROM `users` WHERE login = '$login' AND password='$password'");

if ($checkauth->num_rows) {

  $user = mysqli_fetch_assoc($checkauth);
  $_SESSION['user'] = [
    "id" => $user['id'],
    "avatar" => $user['avatar'],
    "name" => $user['username'],
    "login" => $user['login'],
    "email" => $user['email'],
    "time" => $user['time']
  ];
  $responce = [
    "status" => true
  ];
  echo json_encode($responce);
} else {
  $responce = [
    "status" => false,
    "message" => "Неверный логин или пароль"
  ];
  echo json_encode($responce);
}
$mysql->close();
exit();

?>