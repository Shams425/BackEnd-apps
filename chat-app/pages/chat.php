<?php
  session_start();
  if (!isset($_SESSION['unique_id'])) {
      header('location: login.php');
  }
  ?>

<?php include_once "../assets/php/header.php"; ?>

<body>
  <div class="container">
    <div class="row">
      <section class="contentContainer chat-area">
        <div class="wrapper">
          <header>
            <!-- include the database -->
            <?php
              include_once "../assets/php/config.php";
  $user_id = mysqli_real_escape_string($data_base, $_GET['unique_id']);
  $sql = mysqli_query($data_base, "SELECT * FROM users WHERE unique_id = {$user_id}");
  $acc_sql = mysqli_query($data_base, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");

  if (mysqli_num_rows($sql) > 0) {
      $row = mysqli_fetch_assoc($sql);
  }
  if (mysqli_num_rows($acc_sql) > 0) {
      $acc_row = mysqli_fetch_assoc($acc_sql);
  }
  ?>
            <div class="content">
              <a href="users.php">
                <i class="fas fa-arrow-left"></i>
              </a>

              <!-- profile picture -->
              <img
                src="../assets/php/images/<?php echo $row['img']; ?>" />

              <div class="details">
                <span>
                  <?php echo $row['first_name']. " " . $row['last_name']; ?>
                </span>
                <p>
                  <?php echo $row['status']?>
                </p>
              </div>
            </div>
          </header>

          <!-- chat messages part -->
          <div class="chat-box">
          </div>

          <!-- sending message form -->
          <form action="#" method="POST" class="sendingForm" name="messages">
            <div class="sendContainer d-flex">
              <!-- these 2 inputs are hidden, they handle the sender & receiver -->
              <input type="text" name="sender" id="" class="sender_id" value=<?php echo $_SESSION['unique_id'];?>
              hidden="true">
              <input type="text" name="receiver" id="" class="receiver_id" value=<?php echo $user_id;?> hidden="true">

              <input type="text" name="message" id="" class="form-control msg"
                placeholder="Type your message here ..." />
              <button class="btn btn-dark send">
                <i class="fab fa-telegram-plane"></i>
              </button>
            </div>
          </form>
      </section>
    </div>
  </div>

  <!-- external library -->
  <script src="../assets/js/bootstrap.min.js"></script>

  <!-- main js file -->
  <script src="../assets/js/chat.js"></script>
</body>

</html>