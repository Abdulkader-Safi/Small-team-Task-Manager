<nav class="side-nav">
  <div class="header-nav">
    <h1><a href="/home">Task Manager</a></h1>
  </div>
  <div class="body-nav">
    <a href="/home">Home</a>
    <?php
    if (!is_null($_SESSION['id']) && !is_null($_SESSION['user']) && !is_null($_SESSION['email'])) {
    ?>
      <a href="#">Chat</a>
      <a href="#">Contact</a>
      <a href="#"></a>
      <a href="#"></a>
      <a href="/logout">logout</a>
    <?php
    } else {
    ?>
      <a href="/login">Login</a>
      <a href="/register">Register</a>
    <?php
    }
    ?>

  </div>
  <div class="footer-nav">
    <h4>created By <span class="gold">Abdulkader Safi</span></h4>
  </div>
</nav>