<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (isset($_SESSION['admin']) && $_SESSION['admin'] === "TRUE") {
    require __DIR__ . '/../../../Views/Auth/EditUser.php';
    die();
  } else {
    Redirect('/home');
  }
}
