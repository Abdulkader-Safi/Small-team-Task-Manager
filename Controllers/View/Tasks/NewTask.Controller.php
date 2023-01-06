<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (!is_null($_SESSION['id']) && !is_null($_SESSION['user']) && !is_null($_SESSION['email'])) {
    require __DIR__ . '/../../../Views/NewTask.view.php';
    die();
  } else {
    Redirect('/home');
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $db = new Database();

  if (isset($_POST['add_task'])) {
    $t_title = validate($_POST['t_title']);
    $t_description = validate($_POST['t_description']);


    try {
      $newTask = $db->query(
        'INSERT INTO todos(user_id, title, description, status) VALUES (:id, :t_title, :t_description, "new")',
        ['id' => $_SESSION['id'], 't_title' => $t_title, 't_description' => $t_description]
      );
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    Redirect('/task');
  }
}
