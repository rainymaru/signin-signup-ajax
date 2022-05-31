<?php

session_start();

$name = htmlspecialchars(trim($_POST["name"]));
$login = htmlspecialchars(trim($_POST["login"]));
$password = htmlspecialchars(trim($_POST["password"]));
$password_confirm = htmlspecialchars(trim($_POST["password_confirm"]));
$email = htmlspecialchars(trim($_POST["email"]));

$error_fields = [];

  if (!$_FILES['avatar']){
  $error_fields[] = 'avatar';
}
  if (strlen($login) <= 3) {
  $error_fields[] = 'login';
  } 
  if (strlen($password) <= 3) {
  $error_fields[] = 'password';
  } 
  if (strlen($password_confirm) <= 3) {
    $error_fields[] = 'password_confirm';
    } 
  if (strlen($name) <= 3) {
      $error_fields[] = 'name';
      }   
  if (strlen($email) <= 3) {
    $error_fields[] = 'email';
  }  
  if($password != $password_confirm){
  $responce = [
    "status" => false,
    "message" => "Пароли не совпадают",
  ];
  echo json_encode($responce);
  die();
}
  if (!empty($error_fields)) {
    $responce = [
      "status" => false,
      "type" => 1,
      "message" => "Проверьте правильность ввода полей",
      "fields" => $error_fields
    ];
    echo json_encode($responce);
    die();
} else {
    $path = 'uploads/' . time() . $_FILES['avatar']['name'];
    if(!move_uploaded_file( $_FILES['avatar']['tmp_name'], '' . $path)) {
      echo 'Ошибка загрузки аватарки';
      $responce = [
        "status" => false,
        "type" => 2,
        "message" => "Вы не загрузили аватарку",
      ];
      echo json_encode($responce);
      die();
    }};
    $password = md5($password);
    $mysql =  new mysqli("localhost", "mysql", "mysql", "register");
    $checkbd = $mysql->query("SELECT * FROM `users` WHERE login = '$login' OR email='$email'");
    if (!$checkbd->num_rows) {
    $mysql->query("INSERT INTO `users` (`username`, `login`, `password`, `avatar`, `email`) VALUES ('$name','$login', '$password', '$path', '$email')");
    $mysql->close();
    $_SESSION['login'] = $login;
    $responce = [
      "status" => true,
      "message" => "Вы успешно зарегистрировались"
    ];
    echo json_encode($responce);
    } else {
    $responce = [
      "status" => false,
      "message" => "Аккаунт уже зарегистрирован"
    ];
    echo json_encode($responce);
  }
?>