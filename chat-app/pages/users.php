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
        <section class="contentContainer users">
          <div class="wrapper">
            <header>
              <div class="content">
                <!-- profile picture -->
                <img src="../assets/images/profile-4.jpg" alt="" />

                <div class="details">
                  <span>Chatting room</span>
                  <p>Active now</p>
                </div>
              </div>

              <!-- logout -->
              <a href="#" class="logout btn btn-dark">Logout</a>
            </header>

            <!-- search for chat -->
            <div class="search">
              <span class="text">Select user to start chatting</span>
              <input
                type="text"
                name="search"
                id=""
                class="form-control"
                placeholder="Enter user name ..."
              />
              <button class="btn btn-outline-dark">
                <i class="fas fa-search"></i>
              </button>
            </div>

            <!-- list of users -->
            <div class="usersList">
              <a href="">
                <div class="content">
                  <img src="../assets/images/profile-6.jpg" alt="" />

                  <div class="details">
                    <span>User 1</span>
                    <p>Message for testing</p>
                  </div>
                </div>
                <div class="showStatus">
                  <i class="fas fa-circle"></i>
                </div>
              </a>
              <a href="">
                <div class="content">
                  <img src="../assets/images/profile-6.jpg" alt="" />

                  <div class="details">
                    <span>User 1</span>
                    <p>Message for testing</p>
                  </div>
                </div>
                <div class="showStatus">
                  <i class="fas fa-circle"></i>
                </div>
              </a>
              <a href="">
                <div class="content">
                  <img src="../assets/images/profile-6.jpg" alt="" />

                  <div class="details">
                    <span>User 1</span>
                    <p>Message for testing</p>
                  </div>
                </div>
                <div class="showStatus">
                  <i class="fas fa-circle"></i>
                </div>
              </a>
              <a href="">
                <div class="content">
                  <img src="../assets/images/profile-6.jpg" alt="" />

                  <div class="details">
                    <span>User 1</span>
                    <p>Message for testing</p>
                  </div>
                </div>
                <div class="showStatus">
                  <i class="fas fa-circle"></i>
                </div>
              </a>
              <a href="">
                <div class="content">
                  <img src="../assets/images/profile-6.jpg" alt="" />

                  <div class="details">
                    <span>User 1</span>
                    <p>Message for testing</p>
                  </div>
                </div>
                <div class="showStatus">
                  <i class="fas fa-circle"></i>
                </div>
              </a>
              <a href="">
                <div class="content">
                  <img src="../assets/images/profile-6.jpg" alt="" />

                  <div class="details">
                    <span>User 1</span>
                    <p>Message for testing</p>
                  </div>
                </div>
                <div class="showStatus">
                  <i class="fas fa-circle"></i>
                </div>
              </a>
              <a href="">
                <div class="content">
                  <img src="../assets/images/profile-6.jpg" alt="" />

                  <div class="details">
                    <span>User 1</span>
                    <p>Message for testing</p>
                  </div>
                </div>
                <div class="showStatus">
                  <i class="fas fa-circle"></i>
                </div>
              </a>
            </div>
          </div>
        </section>
      </div>
    </div>

    <!-- external library -->
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- main js file -->
    <script src="../assets/js/"></script>
  </body>
</html>
