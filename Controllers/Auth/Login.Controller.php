<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (!is_null($_SESSION['id']) && !is_null($_SESSION['user']) && !is_null($_SESSION['email'])) {
    Redirect('/home');
  } else {
    require __DIR__ . '/../../Views/Auth/Login.php';
    die();
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $db = new Database();

  if (isset($_POST['login'])) {
    $email = validate($_POST['email']);
    $pass = validate($_POST['pass']);

    $getUser = $db->query('SELECT * FROM users WHERE email = :email AND pass = :pass', ['email' => $email, 'pass' => $pass]);

    if ($getUser->rowCount() > 0) {
      $getUser = $getUser->fetch();
      if ($email === $getUser['email'] && $pass === $getUser['pass']) {
        $_SESSION['id'] = $getUser['id'];
        $_SESSION['user'] = $getUser['full_name'];
        $_SESSION['email'] = $getUser['email'];
        $_SESSION['admin'] = $getUser['roll'] === "admin" ? "TRUE" : "FALSE";
        // if ($getUser['roll'] === 'admin') {
        //   $_SESSION['ADMIN'] == "TRUE";
        // } else {
        //   $_SESSION['ADMIN'] == "FALSE";
        // }
        Redirect('/home');
        exit();
      } else {
        Redirect('/login?error=Incorrect Email or Password');
      }
      Redirect('/login?error=Incorrect Email or Password');
    }
    Redirect('/login?error=Incorrect Email or Password');
  }
}
