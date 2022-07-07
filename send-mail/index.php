<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- bootstrap library -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <!-- main css file -->
  <link rel="stylesheet" href="assets/css/style.css">


  <title>Sending email via localhost</title>
</head>
<body>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="header mt-5">
            <h2 class="text-center">Send Message</h2> 
            <p class="text-center">send mail to anyone from localhost</p>
          </div>

          <main>
            <form action="#" method="POST" autocomplete="off" class="mt-5">
              <div class="form-group mb-3">
                <input type="email" class="form-control p-3" placeholder="you e-mail">
              </div>
              <div class="form-group mb-3">
                <input type="text" class="form-control p-3" placeholder="Subject">
              </div>
              <div class="form-group mb-3">
                <textarea name="message" id="" cols="30" rows="10" class="form-control p-3" placeholder="Your message"></textarea>
              </div>
              <div class="form-group mb-3">
                <input type="submit" class="form-control p-3 btn btn-primary" value="Send">
              </div>
            </form>
          </main>

        </div>
      </div>
    </div>
</body>
</html>