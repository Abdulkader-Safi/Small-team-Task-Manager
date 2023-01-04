<?php
$Title = 'Login';
require_once __DIR__ . '/../Layouts/Header.layout.php';
?>

<div class="body-login">
  <div class="form-login">
    <form method="POST" action="/login">
      <?php if (isset($_GET['error'])) { ?>
        <p class="error"> <?php echo $_GET['error']; ?></p>
      <?php } ?>
      <div class="input">
        <label>Email:</label>
        <input name='email' type="email" placeholder="Email..." required />
      </div>
      <div class="spacer"></div>
      <div class="input">
        <label>Password:</label>
        <input name='pass' type="password" placeholder="********" required />
      </div>
      <div class="spacer"></div>
      <div class="input">
        <button name="login">Login</button>
      </div>
    </form>
  </div>
</div>

<?php
require_once __DIR__ . '/../Layouts/Footer.Layout.php';
?>