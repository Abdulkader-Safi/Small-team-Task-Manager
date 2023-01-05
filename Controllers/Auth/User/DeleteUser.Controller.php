<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (isset($_SESSION['admin']) && $_SESSION['admin'] === "TRUE") {


    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $db = new Database();

      $deleteUser = $db->query('DELETE FROM users WHERE id = :id', ['id' => $_GET['id']]);

      Redirect('/users');
    }


    die();
  } else {
    Redirect('/home');
  }
}
