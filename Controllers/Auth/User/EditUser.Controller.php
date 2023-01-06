<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (isset($_SESSION['admin']) && $_SESSION['admin'] === "TRUE") {
    require __DIR__ . '/../../../Views/Auth/EditUser.php';
    die();
  } else {
    Redirect('/home');
  }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $db = new Database();

  if (isset($_POST['update'])) {
    $uname = validate($_POST['uname']);
    $email = validate($_POST['email']);
    $pass = validate($_POST['pass']);
    $roll = validate($_POST['user_roll']);

    try {
      $user = $db->query('UPDATE users SET full_name=:uname, email=:email, pass=:pass, roll=:roll WHERE id = :id', ['id' => $_GET['id'], 'uname' => $uname, 'email' => $email, 'pass' => $pass, 'roll' => $roll]);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }


    Redirect('/users');
  }
}
