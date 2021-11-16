<?php

	require('func/config.php');

  $events_query = "select * from events";
  $events_list = $event->fetch_events($events_query);

 ?>
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
    <title>Events | Laugh Industry</title>

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
    <main class="main-wrapper active">
      <!-- ========== header start ========== -->
      <header class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-5 col-md-5 col-6">
              <div class="header-left d-flex align-items-center">
                <div class="menu-toggle-btn mr-20">
                <a href="index.php">
                  <img src="assets/images/laughindustry.png" alt="logo" height ="70px" width = "200px" />
                </a>
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-md-7 col-6">
              <div class="header-right">
                <!-- notification start -->
                <div class="notification-box ml-15 d-none d-md-flex">
                  <button
                    class="dropdown-toggle"
                    type="button"
                    id="notification"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <i class="lni lni-enter"></i>                    
                  </button>
                  
                </div>
                <!-- profile end -->
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- ========== header end ========== -->

      <!-- ========== card components start ========== -->
      <section class="card-components">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title mb-30">
                  <h2>Upcoming Events</h2>
                </div>
              </div>
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->
            <!-- ========= card-style-2 start ========= -->
            <div class="row" id = "eventstable">
            <?php foreach ($events_list as $item) :?>
              <!-- end col -->
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div class="card-style-2 mb-30">
                  <div class="card-image">
                    <a href="#0">
                      <img
                        src="images/churchill.jpg"
                        alt=""
                      />
                    </a>
                  </div>
                  <div class="card-content">
                    <h4><a href="#0"><?php echo $item['EventName'];?> </a></h4>
                    <p>
                    <?php echo $item['EventDescription'];?>
                    </p>
                    </br>
                    <h5>Location</h5>
                    <p><?php echo $item['Location'];?></p>
                    </br>
                    <h5>Ticket Prices</h5>
                    <p>VIP Ticket: <?php echo $item['VIPTicketCost'];?></p>
                    <p>Regular Ticket: <?php echo $item['RegularTicketCost'];?></p>
                    <a href="book.php?id=<?php echo $item['Id'];?>" class="read-more" >Book Now!</a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            
              <!-- end col -->
            </div>
            <!-- end row -->
            
            <!-- ========= card-style-3 end ========= -->
          </div>
          <!-- ========== cards-styles end ========== -->
        </div>
        <!-- end container -->
      </section>
      <!-- ========== card components end ========== -->

      <!-- ========== footer start =========== -->
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 order-last order-md-first">
              <div class="copyright text-center text-md-start">
                <p class="text-sm">
                  Designed and Developed by
                  <a
                    href="https://kamonya.github.io/"
                    rel="nofollow"
                    target="_blank"
                  >
                    Kamonya
                  </a>
                </p>
              </div>
            </div>
            <!-- end col-->
            <div class="col-md-6">
              <div
                class="
                  terms
                  d-flex
                  justify-content-center justify-content-md-end
                "
              >
                <a href="#0" class="text-sm">Term & Conditions</a>
                <a href="#0" class="text-sm ml-15">Privacy & Policy</a>
              </div>
            </div>
          </div>
          <!-- end row -->
        </div>
        <!-- end container -->
      </footer>
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
  </body>
</html>
