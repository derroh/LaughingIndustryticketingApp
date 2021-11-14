<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="assets/images/favicon.svg"
      type="image/x-icon"
    />
    <title>Sign Up | Laugh Industry</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
  </head>
  <body>
    <!-- ======== sidebar-nav start =========== -->
   
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      <!-- ========== header start ========== -->
      
      <!-- ========== header end ========== -->

      <!-- ========== signin-section start ========== -->
      <section class="signin-section">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title mb-30">
                  <h2>Sign up</h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="#0">Sign up</a>
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->

          <div class="row g-0 auth-row">
            <div class="col-lg-6">
              <div class="auth-cover-wrapper bg-primary-100">
                <div class="auth-cover">
                  <div class="title text-center">
                    <h1 class="text-primary mb-10">Get Started</h1>
                    <p class="text-medium">
                      Start creating the best possible user experience
                      <br class="d-sm-block" />
                      for you customers.
                    </p>
                  </div>
                  <div class="cover-image">
                    <img src="assets/images/auth/signin-image.svg" alt="" />
                  </div>
                  <div class="shape-image">
                    <img src="assets/images/auth/shape.svg" alt="" />
                  </div>
                </div>
              </div>
            </div>
            <!-- end col -->
            <div class="col-lg-6">
              <div class="signup-wrapper">
                <div class="form-wrapper">
                  <h6 class="mb-15">Sign Up Form</h6>
                  <p class="text-sm mb-25">
                    Start creating the best possible user experience for you
                    customers.
                  </p>

                  <!-- create user account -->
                  <?php
							    				 if(isset($_POST['signupform']))
                           {

														  $Name = $_POST['Name'];
															$Email = $_POST['Email'];
															$PhoneNumber = $_POST['PhoneNumber'];
															$Password = $_POST['Password'];
                              $ConfirmPassword = $_POST['ConfirmPassword'];


							    					 if(empty($Name)){
							    						 $errMSG = "Please give the Name";
							    					 }else if(empty($Email)){
							    						 $errMSG = "Please give the email";
							    					 }else if(empty($PhoneNumber)){
							    						 $errMSG = "Please give the phone number";
							    					 }else if(empty($Password)){
							    						 $errMSG = "Please give the password";
							    					 }else if(empty($ConfirmPassword)){
							    						 $errMSG = "Please confirm password";
							    					 }else {
                                if($ConfirmPassword != $Password){
                                  $errMSG = "Your passwords do not match. Try again";
                                }
							    					 }

							    					 if(!isset($errMSG))
							    					 {
							    							$stmt = $db->prepare('INSERT INTO users( Name, Email, PhoneNumber, Password) VALUES (:Name, :Email, :PhoneNumber, :Password)                                ');

							                    $stmt->bindParam(':Name', $Name);
							                    $stmt->bindParam(':Email', $Email);
							    								$stmt->bindParam(':PhoneNumber', $PhoneNumber);
                                  $stmt->bindParam(':Password', $Password);
							    								if($stmt->execute())
							    								{
							    									$message = "The account was successfully created";
							    									//header("refresh:5;index.php"); // redirects image view page after 5 seconds.
							    								}
							    								else
							    								{
							    									$errMSG = "An error occured while inserting....";
							    								}

							    					 }
							    				 }
							    				 if(isset($message)){
							    					 echo "<div class='alert alert-success' role='alert'>
							    										<strong>Well done!</strong> $message.
							    								 </div>
							    								 <div class='clearfix'> </div>
							    								 " ;
							    				 }else if(isset($errMSG)) {
							    					echo "<div class='alert alert-danger' role='alert'>
							    									 <strong> Oh snap!</strong> $errMSG.
							    								</div>
							    								<div class='clearfix'> </div>
							    								";
							    				 }
							    				 ?>


                  <form action="signup.php" id ="signupform" method = "POST">
                    <div class="row">
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Name</label>
                          <input type="text" placeholder="Name" id ="Name" required />
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Phone</label>
                          <input type="text" placeholder="Phone" id = "Phone" required />
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Email</label>
                          <input type="email" placeholder="Email" id ="Email" required />
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Password</label>
                          <input type="password" placeholder="Password" id = "Password" required/>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Confirm Password</label>
                          <input type="password" placeholder="Confirm Password" id ="ConfirmPassword" required/>
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-12">
                        <div class="form-check checkbox-style mb-30">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            value=""
                            id="checkbox-not-robot"
                          />
                          <label
                            class="form-check-label"
                            for="checkbox-not-robot"
                          >
                            I'm not robot</label
                          >
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-12">
                        <div
                          class="
                            button-group
                            d-flex
                            justify-content-center
                            flex-wrap
                          "
                        >
                          <button
                            class="
                              main-btn
                              primary-btn
                              btn-hover
                              w-100
                              text-center
                            "
                            id ="btn-signup" type = "submit"
                          >
                            Sign Up
                          </button>
                        </div>
                      </div>
                    </div>
                    <!-- end row -->
                  </form>
                  
                </div>
              </div>
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </div>
      </section>
      <!-- ========== signin-section end ========== -->

      <!-- ========== footer start =========== -->
      
      <?php include('includes/footer.php');?>

      <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/Chart.min.js"></script>
    <script src="assets/js/dynamic-pie-chart.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>
    <script src="assets/js/jvectormap.min.js"></script>
    <script src="assets/js/world-merc.js"></script>
    <script src="assets/js/polyfill.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>  
    
  </body>
</html>
