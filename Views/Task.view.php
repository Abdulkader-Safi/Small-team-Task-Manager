<?php
$Title = 'task';
require_once __DIR__ . '/Layouts/Header.layout.php';
$db = new Database();

?>

<div class="body-task">
  <div class="body-top-task">
    <h1>Todo Tasks</h1>
  </div>
  <div class="body-content-task">
    <div class="todos">
      <div class="todo_type">
        <h4><a href="/new_todo">New Todo</a></h4>
      </div>
      <div class="todos_in">
        <?php
        $todos = $db->query('SELECT * FROM todos t WHERE t.id != :id AND status = "new"', ['id' => $_SESSION['id']]);
        if (!$todos) {
          die("Invalid Query!");
        }

        while ($row = $todos->fetch(PDO::FETCH_ASSOC)) {
        ?>
          <div class="todo">
            <a href="/update_todo?tid=<?= $row['id'] ?>" class="title"><?= $row['title'] ?></a>
            <p class="description"><?= $row['description'] ?></p>
            <p class="created_at">create at: <?= $row['created_at'] ?></p>
          </div>
        <?php
        }
        ?>
      </div>
    </div>

    <div class="todos">
      <div class="todo_type">
        <h4>On It</h4>
      </div>
      <div class="todos_in">
        <?php
        $todos = $db->query('SELECT * FROM todos t WHERE t.id != :id AND status = "on_it"', ['id' => $_SESSION['id']]);
        if (!$todos) {
          die("Invalid Query!");
        }

        while ($row = $todos->fetch(PDO::FETCH_ASSOC)) {
        ?>
          <div class="todo">
            <a href="/update_todo?tid=<?= $row['id'] ?>" class="title"><?= $row['title'] ?></a>
            <p class="description"><?= $row['description'] ?></p>
            <p class="created_at">create at: <?= $row['created_at'] ?></p>
          </div>
        <?php
        }
        ?>
      </div>
    </div>

    <div class="todos">
      <div class="todo_type">
        <h4>Done Tasks</h4>
      </div>
      <div class="todos_in">
        <?php
        $todos = $db->query('SELECT * FROM todos t WHERE t.id != :id AND status = "done"', ['id' => $_SESSION['id']]);
        if (!$todos) {
          die("Invalid Query!");
        }

        while ($row = $todos->fetch(PDO::FETCH_ASSOC)) {
        ?>
          <div class="todo">
            <a href="/update_todo?tid=<?= $row['id'] ?>" class="title"><?= $row['title'] ?></a>
            <p class="description"><?= $row['description'] ?></p>
            <p class="created_at">create at: <?= $row['created_at'] ?></p>
          </div>
        <?php
        }
        ?>
      </div>
    </div>

  </div>
</div>

<?php
require_once __DIR__ . '/Layouts/Footer.Layout.php';
?>