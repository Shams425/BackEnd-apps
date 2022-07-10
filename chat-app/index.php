<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat app</title>

    <!-- font awesome library -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- bootstrap library -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link 
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" 
      rel="stylesheet"
    >

    <!-- main css file -->
    <link rel="stylesheet" href="assets/css/main.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <section class="form signup">
          <form action="#">
            <div class="alert alert-danger">Error text</div>

            <!-- form data start -->
            <div class="form-group mb-3">
              <label for="text" class="mb-2">First Name</label>
              <input type="text" name="firstName" id="" class="form-control" placeholder="Your First Name"/>
            </div>
            <div class="form-group mb-3">
              <label for="text" class="mb-2">Last Name</label>
              <input type="text" name="lastName" id="" class="form-control" placeholder="Your Last Name"/>
            </div>
            <div class="form-group mb-3">
              <label for="email" class="mb-2">Email Address</label>
              <input type="email" name="email" id="" class="form-control" placeholder="Enter You E-mail"/>
            </div>
            <div class="form-group mb-3">
              <label for="password" class="mb-2">Password</label>
              <input type="password" name="password" id="" class="form-control" placeholder="Enter Your Password"/>
            </div>
            <div class="form-group mb-3">
              <label for="password" class="mb-2">Rewrite Password</label>
              <input type="password" name="rePassword" id="" class="form-control" placeholder="Rewrite Your Password"/>
            </div>
            <div class="form-group mb-3">
              <label for="file" class="mb-2">
                <p>Select Profile Img</p>
                <i class="fas fa-upload"></i>
              </label>
              <input type="file" name="imgFile" id="" class="form-control" style="display:none"/>
            </div>
          </form>
        </section>
      </div>
    </div>

    <!-- external library -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- main js file -->
    <script src="assets/js/main.js"></script>
  </body>
</html>