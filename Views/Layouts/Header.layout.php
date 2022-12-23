<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?= $Title ?></title>

  <style>
    <?php
    require_once __DIR__ . '/CSS/Main.css';
    require_once __DIR__ . '/CSS/Navbar.css';
    require_once __DIR__ . '/CSS/Home.css';
    require_once __DIR__ . '/CSS/Login.css';
    ?>
  </style>
</head>

<body>
  <div style="width: 20vw;"></div>
  <?php
  require_once __DIR__ . '/../Components/Navbar.php';
  ?>
  <div class="contentBody">