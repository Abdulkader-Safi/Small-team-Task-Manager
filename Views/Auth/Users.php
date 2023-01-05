<?php
$Title = 'Users';
require_once __DIR__ . '/../Layouts/Header.layout.php';

$db = new Database();
?>

<div class="body-users">
  <div class="content-users">
    <div class="content-header-users">
      Users
    </div>
    <div class="content-body-users">
      <table>
        <colgroup>
          <col span="1" style="width:20%">
          <col span="1" style="width:20%">
          <col span="1" style="width:20%">
          <col span="1" style="width:20%">
          <col span="1" style="width:10%">
          <col span="1" style="width:10%">
        </colgroup>
        <thead>
          <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>roll</th>
            <th>Created Date</th>
            <th>Chat</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <?php
        $users = $db->query('SELECT * FROM users u WHERE u.id != :me', ['me' => $_SESSION['id']]);
        if (!$users) {
          die("Invalid Query!");
        }

        while ($row = $users->fetch(PDO::FETCH_ASSOC)) {
        ?>

          <tbody>
            <tr>
              <td><?= $row['full_name'] ?></td>
              <td><?= $row['email'] ?></td>
              <td><?= $row['roll'] ?></td>
              <td><?= $row['join_date'] ?></td>
              <td>
                <a type='' class='chat' href='/chat?to=<?= $row['id'] ?>'>Chat</a>
              </td>
              <td>
                <a type='' class='edit' href='/edit?id=<?= $row['id'] ?>'>Edit</a>
              </td>
              <td>
                <a type='' class='delete' href='/delete?id=<?= $row['id'] ?>'>Delete</a>
              </td>
            </tr>
          </tbody>
        <?php

        }
        ?>
      </table>
    </div>
  </div>
</div>

<?php
require_once __DIR__ . '/../Layouts/Footer.Layout.php';
?>