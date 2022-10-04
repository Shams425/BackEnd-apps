<!DOCTYPE html>
<html>
	<head>
		<title>Home-CHMSC</title>
		<link rel="shortcut icon" href="./Images/icbs_logo.png" type="image/x-icon">
		<!-- external library -->
		<link rel="stylesheet" href="./assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="./assets/css/all.min.css">
		<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
		
		<!-- footer stylesheet -->
		<link rel="stylesheet" href="./assets/css/footer.css">
		
		<!-- main css file -->
		<link rel="stylesheet" href="./assets/css/main.css">
	</head>
	<body>
		<header>
			<nav class="navbar navbar-expand-sm navbar-light bg-light">
				<div class="container d-flex align-items-center">
					<div class="sch-info d-flex align-items-center flex-wrap">
						<a class="navbar-brand" href="#">
							<i class="nav-icon fas fa-pen"></i>
						</a>
						<!-- <span>Welcome to X-Code school management Dashboard</span> -->
					</div>

					<div class="nav-shortCuts d-flex align-items-center flex-wrap">
						<button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
							aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="collapsibleNavId">
							<ul class="navbar-nav me-auto mt-2 mt-lg-0">
								<li class="nav-item">
									 <form action="" method="post">
										<input type="text" class="form-control" placeholder="Search ...">
										<i class="fas fa-search"></i>
									 </form>
								</li>
								<li class="nav-item dropdown">
									<select name="Languages" id="" class="form-control">
										<option value="English">English</option>
										<option value="Arabic">Arabic</option>
									</select>
								</li>
								<li class="nav-item">
									<div class="notifications d-flex align-items-center">
										<div class="icon">
											<i class="fas fa-envelope"></i>
											<span class="active">3</span>
										</div>
										<div class="icon">
											<i class="fas fa-bell mx-3"></i>
											<span class="active">12</span>
										</div>
									</div>
								</li>
								<li class="nav-item profile">
									<div class="user d-flex align-items-center">
										<div class="profilePic">
											<!-- <img src="./assets/img/" alt="" width="50"> -->
											<i class="fas fa-user mx-3"></i>
										</div>
										<select name="userSelect" id="" class="form-control">
											<option value="Ahmed">Ahmed Yassin</option>
											<option value="Mohamed"></option>
											<option value="Ibrahim"></option>
										</select>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</nav>
		</header>
		