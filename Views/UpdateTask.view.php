<?php
$Title = 'Edit Task';
require_once __DIR__ . '/Layouts/Header.layout.php';
$db = new Database();



$todo = $db->query('SELECT * FROM todos t WHERE t.id = :id', ['id' => $_GET['tid']]);
if (!$todo) {
  die("Invalid Query!");
}
$row = $todo->fetch();

?>

<div class="body-new-todo">
  <div class="form-new-todo">
    <form method="POST" action="/update_task?tid=<?= $_GET['tid'] ?>">
      <?php if (isset($_GET['error'])) { ?>
        <p class="error"> <?php echo $_GET['error']; ?></p>
      <?php } ?>
      <div class="input">
        <label>Task Title:</label>
        <input name='t_title' type="text" placeholder="User Name..." value="<?= $row["title"] ?>" required />
      </div>
      <div class="spacer"></div>
      <div class="input">
        <label>Task Description:</label>
        <textarea name='t_description' type="email" placeholder="Email..." required> <?= $row["description"] ?></textarea>
      </div>
      <div class="input">
        <label>Task Status:</label>
        <select name="t_status" value="<?= $row["status"] ?>">
          <option value="new">new</option>
          <option value="on_it">on_it</option>
          <option value="done">done</option>
        </select>
      </div>
      <div class="spacer"></div>
      <div class="input">
        <button name="edit_task">Edit Task</button>
      </div>
      <div class="input">
        <button name="delete_task">Delete Task</button>
      </div>
    </form>
  </div>
</div>

<?php
require_once __DIR__ . '/Layouts/Footer.Layout.php';
?>