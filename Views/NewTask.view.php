<?php
$Title = 'New Task';
require_once __DIR__ . '/Layouts/Header.layout.php';
?>

<div class="body-new-todo">
  <div class="form-new-todo">
    <form method="POST" action="/new_todo">
      <?php if (isset($_GET['error'])) { ?>
        <p class="error"> <?php echo $_GET['error']; ?></p>
      <?php } ?>
      <div class="input">
        <label>Task Title:</label>
        <input name='t_title' type="text" placeholder="User Name..." required />
      </div>
      <div class="spacer"></div>
      <div class="input">
        <label>Task Description:</label>
        <textarea name='t_description' type="email" placeholder="Email..." required> </textarea>
      </div>
      <div class="spacer"></div>
      <div class="input">
        <button name="add_task">Add todo</button>
      </div>
    </form>
  </div>
</div>

<?php
require_once __DIR__ . '/Layouts/Footer.Layout.php';
?>