<?php
$Title = 'Task';
require_once __DIR__ . '/Layouts/Header.layout.php';
$db = new Database();

?>

<div class="body-chat">
  <div class="body-top-chat">
    <div class="friend-chat">
      <div class="friend-title-chat">
        <p>Friends List</p>
      </div>
      <div class="friend-list-chat">
        <?php
        $friends = $db->query('SELECT u.id, u.full_name from users u WHERE u.id != :me', ['me' => $_SESSION['id']]);
        if (!$friends) {
          die("Invalid Query!");
        }
        while ($row = $friends->fetch(PDO::FETCH_ASSOC)) {
        ?>
          <div class="friend-name-chat">
            <a href="/chat?to=<?= $row['id'] ?>"><?= $row['full_name'] ?></a>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
    <div class="friend-area-chat">
      <div class="friend-area-top-chat">
        <?php
        $friend = $db->query('SELECT u.full_name from users u WHERE u.id = :to', ['to' => $_GET['to']]);
        if (!$friends) {
          die("Invalid Query!");
        }
        $row = $friend->fetch();
        ?>
        <p><?= $row["full_name"] ?></p>
      </div>
      <?php
      if (isset($_GET['to'])) {
      ?>
        <div class="massage-show-chat">
          <?php
          if (!is_null($_GET['to'])) {
            $friends = $db->query('SELECT c.massage, c.from_id, c.to_id FROM chats c WHERE ((c.from_id = :me AND c.to_id = :to) OR (c.to_id = :me AND c.from_id = :to )) ORDER BY id', ['me' => $_SESSION['id'], 'to' => $_GET['to']]);
            if (!$friends) {
              die("Invalid Query!");
            }
            while ($row = $friends->fetch(PDO::FETCH_ASSOC)) {
          ?>
              <div class="msg <?= ($row['from_id'] === $_SESSION['id'] ? "from" : "to") ?>">
                <p>
                  <?= $row['massage'] ?>
                </p>
              </div>
            <?php
            }
          } else {
            ?>
            <div class="not-select-chat">
              <div class="body-top-home">
              </div>
            </div>
          <?php
          }
          ?>
        </div>
        <div class="massage-input-chat">
          <form action="/chat?to=<?= $_GET['to'] ?>" method="POST">
            <input type="text" name="msg" placeholder="Massage..." autofocus required>
            <button name="send_msg">
              send
            </button>
          </form>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
</div>

<?php
require_once __DIR__ . '/Layouts/Footer.Layout.php';
?>