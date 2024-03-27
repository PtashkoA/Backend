<?php

header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (!empty($_GET['save'])) {
    print('Спасибо, результаты сохранены.');
  }
  include('form.php');
  exit();
}

$errors = FALSE;
if (empty($_POST['fio'])) {
  print('Заполните ФИО.<br/>');
  $errors = TRUE;
}

if (empty($_POST['email']) || !is_numeric($_POST['email']) || !preg_match('/^\d+$/', $_POST['email'])) {
  print('Заполните E-mail.<br/>');
  $errors = TRUE;
}

if (empty($_POST['tel']) || !is_numeric($_POST['tel']) || !preg_match('/^\d+$/', $_POST['tel'])) {
  print('Заполните номер телефона.<br/>');
  $errors = TRUE;
}

if (empty($_POST['date_of_birth']) || !is_numeric($_POST['date_of_birth']) || !preg_match('/^\d+$/', $_POST['date_of_birth'])) {
  print('Заполните дату рождения.<br/>');
  $errors = TRUE;
}

if (empty($_POST['gender']) || !is_numeric($_POST['gender']) || !preg_match('/^\d+$/', $_POST['gender'])) {
  print('Заполните пол.<br/>');
  $errors = TRUE;
}

if ($errors) {
  exit();
}

$user = 'u67326';
$pass = '6963806';
$db = new PDO('mysql:host=localhost;dbname=u67326', $user, $pass,
  [PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
try {
  $stmt = $db->prepare("INSERT INTO application SET name = ?");
  $stmt->execute([$_POST['fio'], $_POST['date_of_birth', $_POST['tel'], $_POST['fio'], $_POST['email'], $_POST['gender']]);
}
catch(PDOException $e){
  print('Error : ' . $e->getMessage());
  exit();
}


header('Location: ?save=1');
?>
