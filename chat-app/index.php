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
          <div class="wrapper">
            <div class="title">
              <h1>Realtime Chat app</h1>
            </div>
            <form action="#">
              <div class="alert alert-danger mt-3 text-center">Error text</div>
  
              <!-- form data start -->
              <div class="nameDetails d-flex flex-wrap">
                <div class="firstName col-lg-6 col-md-12 col-sm-12">
                  <div class="form-group">
                    <label for="text" class="mb-2">First Name</label>
                    <input type="text" name="firstName" id="" class="form-control" placeholder="Your First Name"/>
                  </div>
                </div>
                <div class="lastName col-lg-6 col-md-12 col-sm-12">
                  <div class="form-group mb-3">
                    <label for="text" class="mb-2">Last Name</label>
                    <input type="text" name="lastName" id="" class="form-control" placeholder="Your Last Name"/>
                  </div>
                </div>
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
                <label for="file" class="mb-2">Select Profile Img</label>
                <input type="file" name="imgFile" id="" class="form-control" accept="image/*"/>
              </div>
              <div class="form-group mt-5 text-center">
                <input type="submit" name="send" id="" class="btn btn-dark" Value="Start Chatting"/>
              </div>
            </form>

            <!-- prevues user -->
            <div class="link text-center mt-3">
              Already signed up ? 
              <a href="#">Login now</a>
            </div>
          </div>

        </section>
      </div>
    </div>

    <!-- external library -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- main js file -->
    <script src="assets/js/main.js"></script>
  </body>
</html>