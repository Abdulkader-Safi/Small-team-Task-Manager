<?php
$Title = 'Register';
require_once __DIR__ . '/../Layouts/Header.layout.php';
?>

<div class="body-register">
  <div class="form-register">
    <form method="POST" action="/register">
      <?php if (isset($_GET['error'])) { ?>
        <p class="error"> <?php echo $_GET['error']; ?></p>
      <?php } ?>
      <div class="input">
        <label>User Name:</label>
        <input name='uname' type="text" placeholder="User Name..." required />
      </div>
      <div class="spacer"></div>
      <div class="input">
        <label>Email:</label>
        <input name='email' type="email" placeholder="Email..." required />
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
        <button name="register">Register</button>
      </div>
    </form>
  </div>
</div>

<?php
require_once __DIR__ . '/../Layouts/Footer.Layout.php';
?>