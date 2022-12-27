<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (!is_null($_SESSION['id']) && !is_null($_SESSION['user']) && !is_null($_SESSION['email'])) {
    require __DIR__ . '/../../Views/Chat.view.php';
    die();
  } else {
    Redirect('/login');
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!is_null($_SESSION['id']) && !is_null($_SESSION['user']) && !is_null($_SESSION['email'])) {
    if (isset($_POST['send_msg']) && !is_null($_POST['send_msg'])) {
      $db = new Database();

      $me = $_SESSION['id'];
      $to = $_GET['to'];
      $msg = validate($_POST['msg']);

      $db = new Database();
      $massage = $db->query('INSERT INTO chats (from_id, to_id, massage) VALUES (:me, :to, :msg)', ['me' => $me, 'to' => $to, 'msg' => $msg]);
      if (!$massage) {
        die("Invalid Query!");
      }

      require __DIR__ . '/../../Views/Chat.view.php';
      die();
    }
  }
  Redirect('/login');
}
