<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chat app</title>

    <!-- font awesome library -->
    <link rel="stylesheet" href="../assets/css/all.min.css" />
    <!-- bootstrap library -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap"
      rel="stylesheet"
    />

    <!-- main css file -->
    <link rel="stylesheet" href="../assets/css/main.css" />
  </head>
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
                <input
                  type="email"
                  name="email"
                  id=""
                  class="form-control"
                  placeholder="Enter You E-mail"
                />
              </div>
              <div class="form-group mb-3 password">
                <label for="password" class="mb-2">Password</label>
                <input
                  type="password"
                  name="password"
                  id=""
                  class="form-control"
                  placeholder="Enter Your Password"
                />
                <i class="fas fa-eye"></i>
              </div>
              <div class="form-group mt-5 text-center button">
                <input
                  type="submit"
                  name="send"
                  id=""
                  class="btn btn-dark"
                  value="Login"
                />
              </div>
            </form>

            <!-- prevues user -->
            <div class="link text-center mt-3">
              Don't have account ?
              <a href="#">Signup now</a>
            </div>
          </div>
        </section>
      </div>
    </div>

    <!-- external library -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- main js file -->
    <script src="../assets/js/show-hide-password.js"></script>
  </body>
</html>
