<!-- let the user directly login to his account if he isn't logout before -->
<?php
  session_start();
if (isset($_SESSION['unique_id'])) {
    header('location: pages/users.php');
}
?>

<?php include_once "../assets/php/header.php"; ?>

<body>
  <div class="container">
    <div class="row">
      <section class="contentContainer login">
        <div class="wrapper">
          <div class="title">
            <h1>Realtime Chat app</h1>
          </div>
          <form action="#">
            <div class="alert alert-danger mt-3 text-center">Error text</div>

            <!-- form data start -->
            <div class="form-group mb-3">
              <label for="email" class="mb-2">Email</label>
              <input type="email" name="email" class="form-control" placeholder="Enter You E-mail" />
            </div>
            <div class="form-group mb-3 password">
              <label for="password" class="mb-2">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Enter Your Password" />
              <i class="fas fa-eye"></i>
            </div>
            <div class="form-group mt-5 text-center button">
              <input type="submit" name="send" class="btn btn-dark" value="Login" />
            </div>
          </form>

          <!-- prevues user -->
          <div class="link text-center mt-3">
            Don't have account ?
            <a href="../index.php">Signup now</a>
          </div>
        </div>
      </section>
    </div>
  </div>

  <!-- external library -->
  <script src="../assets/js/bootstrap.min.js"></script>
  <!-- main js file -->
  <script src="../assets/js/show-hide-password.js"></script>
  <script src="../assets/js/login.js"></script>
</body>

</html>