<nav class="side-nav">
  <div class="header-nav">
    <h1><a href="/home">Task Manager</a></h1>
  </div>
  <div class="body-nav">
    <a href="/home">Home</a>
    <?php
    // dd($_SESSION);
    if (!is_null($_SESSION['id']) && !is_null($_SESSION['user']) && !is_null($_SESSION['email']) && !is_null($_SESSION['admin'])) {
    ?>
      <a href="/chat">Chat</a>
      <a href="/task">Tasks</a>
      <a href="#"></a>
      <a href="#"></a>
      <a href="#"></a>
      <a href="#"></a>
      <?php
      if (isset($_SESSION['admin']) && $_SESSION['admin'] === "TRUE") {
      ?>
        <a href="/register">Register New User</a></a>
        <a href="/users">Users</a>
      <?php
      } else {
      ?>
        <a href="#"></a>
        <a href="#"></a>
      <?php
      }
      ?>
      <a href="/logout">logout</a>
    <?php
    } else {
    ?>
      <a href="/login">Login</a>
    <?php
    }
    ?>

  </div>
  <div class="footer-nav">
    <h4>created By <span class="gold">Abdulkader Safi</span></h4>
  </div>
</nav>