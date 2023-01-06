<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link type="image/png" sizes="32x32" rel="icon" href="/favicon">

  <title><?= $Title ?></title>

  <style>
    <?php
    require_once __DIR__ . '/CSS/Main.css';
    require_once __DIR__ . '/CSS/Navbar.css';
    require_once __DIR__ . '/CSS/Home.css';
    require_once __DIR__ . '/CSS/Login.css';
    require_once __DIR__ . '/CSS/Register.css';
    require_once __DIR__ . '/CSS/Chat.css';
    require_once __DIR__ . '/CSS/Task.css';
    require_once __DIR__ . '/CSS/Users.css';
    require_once __DIR__ . '/CSS/NewTask.css';
    ?>
  </style>
</head>

<body>
  <div style="width: 20vw;"></div>
  <?php
  require_once __DIR__ . '/../Components/Navbar.php';
  ?>
  <div class="contentBody">