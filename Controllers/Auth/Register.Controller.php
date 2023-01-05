<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (!is_null($_SESSION['id']) && !is_null($_SESSION['user']) && !is_null($_SESSION['email'])) {
    if (isset($_SESSION['admin']) && $_SESSION['admin'] === "TRUE") {
      require __DIR__ . '/../../Views/Auth/Register.php';
      die();
    } else {
      Redirect('/home');
      die();
    }
  } else {
    Redirect('/home');
    die();
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // dd($_POST);

  $db = new Database();

  if (isset($_POST['register'])) {
    $uname = validate($_POST['uname']);
    $email = validate($_POST['email']);
    $pass = validate($_POST['pass']);
    $roll = validate($_POST['user_roll']);

    try {
      $notes = $db->query('INSERT INTO users(full_name, email, pass, roll) VALUES (:uname, :email, :pass, :roll)', ['uname' => $uname, 'email' => $email, 'pass' => $pass, 'roll' => $roll]);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    Redirect('/register');
  }
}
