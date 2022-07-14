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
      <section class="contentContainer users">
        <div class="wrapper">
          <header>
            <!-- include the database -->
            <?php
  include_once "../assets/php/config.php";
  $sql = mysqli_query($data_base, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");

  if (mysqli_num_rows($sql) > 0) {
      $row = mysqli_fetch_assoc($sql);
  }
  ?>

            <div class="content">
              <!-- profile picture -->
              <img
                src="../assets/php/images/<?php echo "{$row['img']}"; ?>"
                alt="" />

              <div class="details">
                <span><?php echo "{$row['first_name']}". " " . "{$row['last_name']}"; ?></span>
                <p><?php echo "{$row['status']}"?>
                </p>
              </div>
            </div>

            <!-- logout -->
            <a href="#" class="logout btn btn-dark">Logout</a>
          </header>

          <!-- search for chat -->
          <div class="search">
            <span class="text">Select user to start chatting</span>
            <input type="text" name="search" id="" class="form-control" placeholder="Enter user name ..." />
            <button class="btn btn-outline-dark">
              <i class="fas fa-search"></i>
            </button>
          </div>

          <!-- list of users -->
          <div class="usersList"></div>
        </div>
      </section>
    </div>
  </div>

  <!-- external library -->
  <script src="../assets/js/bootstrap.min.js"></script>

  <!-- main js file -->
  <script src="../assets/js/users.js"></script>
</body>

</html>