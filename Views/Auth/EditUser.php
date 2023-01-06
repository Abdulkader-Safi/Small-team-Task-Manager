<?php
$Title = 'UpdateUser';
require_once __DIR__ . '/../Layouts/Header.layout.php';
$db = new Database();



$user = $db->query('SELECT * FROM users u WHERE u.id = :to', ['to' => $_GET['id']]);
if (!$user) {
  die("Invalid Query!");
}
$row = $user->fetch();
?>

<div class="body-register">
  <div class="form-register">
    <form method="POST" action="/edit?id=11">
      <?php if (isset($_GET['error'])) { ?>
        <p class="error"> <?php echo $_GET['error']; ?></p>
      <?php } ?>
      <div class="input">
        <label>User Name:</label>
        <input name='uname' type="text" placeholder="User Name..." value="<?= $row["full_name"] ?>" required />
      </div>
      <div class="spacer"></div>
      <div class="input">
        <label>Email:</label>
        <input name='email' type="email" placeholder="Email..." value="<?= $row["email"] ?>" required />
      </div>
      <div class="spacer"></div>
      <div class="input">
        <label>Password:</label>
        <input name='pass' type="password" placeholder="********" required />
      </div>
      <div class="input">
        <label>User Roll:</label>
        <select name="user_roll">
          <option value="normal">Normal User</option>
          <option value="admin">Admin</option>
        </select>
      </div>
      <div class="spacer"></div>
      <div class="input">
        <button name="update">Update</button>
      </div>
    </form>
  </div>
</div>

<?php
require_once __DIR__ . '/../Layouts/Footer.Layout.php';
?>