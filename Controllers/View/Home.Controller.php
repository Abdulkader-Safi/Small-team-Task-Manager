<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  require __DIR__ . '/../../Views/Home.view.php';
  die();
}
