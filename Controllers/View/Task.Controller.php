<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (!is_null($_SESSION['id']) && !is_null($_SESSION['user']) && !is_null($_SESSION['email'])) {
    require __DIR__ . '/../../Views/Task.view.php';
    die();
  } else {
    Redirect('/login');
  }
}
