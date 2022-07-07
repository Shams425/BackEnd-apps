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
        <div class="col-md-6 col-sm-12 mail-form form-control">
          <div class="header mt-3">
            <h2 class="text-center">Send Message</h2> 
            <p class="text-center">send mail to anyone from localhost</p>
          </div>
          <main>
            <!-- start php -->
            <?php
              if(isset($_POST['send'])) {
                // get all the user inputs field data
                $email = $_POST['email'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];
                $sender = "From: alexdavid486@gmail.com";

                // check for empty fields
                if(empty($email) || empty($subject) || empty($message)) {
                  ?>
                    <!-- display alert message when field is empty -->
                    <div class="alert alert-danger text-center">
                      <?php echo "All Inputs Fields are required!!";?>
                    </div>
                    
                  <?php
                  } else {
                  //function to send mail
                  if(mail($email, $subject, $message, $sender)) {
                    ?>
                     <!-- display success message when email is send -->
                     <div class="alert alert-success text-center">
                      <?php echo "Your mail send successfully to $email !!";?>
                      </div>
                      <?php
                  } else {
                    ?>
                    <!-- display alert message when email is somehow not sent -->
                    <div class="alert alert-danger text-center">
                     <?php echo "Failed to sent email!!";?>
                     </div>
                     <?php
                  }
                }
              }
            ?>
            <!-- end php -->
            <form action="index.php" method="POST" autocomplete="off" class="mt-5">
              <div class="form-group mb-3">
                <input type="email" name="email" class="form-control" placeholder="you e-mail">
              </div>
              <div class="form-group mb-3">
                <input type="text" name="subject" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group mb-3">
                <textarea name="message" id="" cols="30" rows="10" class="form-control textarea" placeholder="Your message"></textarea>
              </div>
              <div class="form-group mb-3">
                <input type="submit" name= "send" class="form-control btn btn-primary" value="Send">
              </div>
            </form>
          </main>

        </div>
      </div>
    </div>
</body>
</html>