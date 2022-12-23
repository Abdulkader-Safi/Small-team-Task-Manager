<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (!is_null($_SESSION['id']) && !is_null($_SESSION['user']) && !is_null($_SESSION['email'])) {
    Redirect('/home');
  } else {
    require __DIR__ . '/../../Views/Auth/Register.php';
    die();
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $db = new Database();

  if (isset($_POST['register'])) {
    $uname = validate($_POST['uname']);
    $email = validate($_POST['email']);
    $pass = validate($_POST['pass']);

    try {
      $notes = $db->query('INSERT INTO `users`(`full_name`, `email`, `pass`) VALUES (:uname, :email, :pass)', ['uname' => $uname, 'email' => $email, 'pass' => $pass]);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    $getUser = $db->query('SELECT * FROM users WHERE email = :email AND pass = :pass', ['email' => $email, 'pass' => $pass]);
    if ($getUser->rowCount() > 0) {
      $getUser = $getUser->fetch();
      if ($email === $getUser['email'] && $pass === $getUser['pass']) {

        $_SESSION['id'] = $getUser['id'];
        $_SESSION['user'] = $getUser['full_name'];
        $_SESSION['email'] = $getUser['email'];

        Redirect('/home');
        exit();
      }
    }
  }
}
