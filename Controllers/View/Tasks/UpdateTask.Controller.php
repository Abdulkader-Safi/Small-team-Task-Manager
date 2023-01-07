<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (!is_null($_SESSION['id']) && !is_null($_SESSION['user']) && !is_null($_SESSION['email'])) {
    require __DIR__ . '/../../../Views/UpdateTask.view.php';
    die();
  } else {
    Redirect('/home');
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $db = new Database();

  if (isset($_POST['edit_task'])) {
    $t_title = validate($_POST['t_title']);
    $t_description = validate($_POST['t_description']);
    $t_status = validate($_POST['t_status']);

    try {
      $updateTask = $db->query(
        'UPDATE todos SET title=:t_title, description=:t_description, status=:t_status, updated_at=CURRENT_TIMESTAMP WHERE id = :id',
        ['id' => $_GET['tid'], 't_title' => $t_title, 't_description' => $t_description, 't_status' => $t_status]
      );
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    Redirect('/task');
  }

  if (isset($_POST['delete_task'])) {
    try {
      $updateTask = $db->query('DELETE FROM todos WHERE id = :id', ['id' => $_GET['tid']]);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    Redirect('/task');
  }
}
