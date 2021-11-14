<?php

	require('func/config.php');

	if(!$user->is_logged_in()){
		header('Location: signin.php');
  }

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
    <?php include('includes/sidebar-nav.php');?>
    
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      <!-- ========== header start ========== -->

      <?php include('includes/header.php');?>

      <!-- ========== header end ========== -->

      <!-- ========== table components start ========== -->
      <section class="table-components">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title mb-30">
                  <h2>Events</h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="#0">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Events
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

          <!-- ========== tables-wrapper start ========== -->
          <div class="tables-wrapper">
            <div class="row">
              <div class="col-lg-12">
                <div class="card-style mb-30">
                  <h6 class="mb-10">Laugh Industry Events</h6>
                  <p class="text-sm mb-20">
                    List of upcoming, ongoing and past Laugh Industry events
                  </p>
                  <div class="table-wrapper table-responsive">
                    <table class="table" id="eventstable">
                      <thead>
                        <tr>
                          <th><h6>Lead</h6></th>
                          <th><h6>Email</h6></th>
                          <th><h6>Phone No</h6></th>
                          <th><h6>Company</h6></th>
                          <th><h6>Action</h6></th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <tbody>
                        <tr>
                          <td class="min-width">
                            <div class="lead">
                              <div class="lead-image">
                                
                              </div>
                              <div class="lead-text">
                                <p>Courtney Henry</p>
                              </div>
                            </div>
                          </td>
                          <td class="min-width">
                            <p><a href="#0">yourmail@gmail.com</a></p>
                          </td>
                          <td class="min-width">
                            <p>(303)555 3343523</p>
                          </td>
                          <td class="min-width">
                            <p>UIdeck digital agency</p>
                          </td>
                          <td>
                            <div class="action">
                              <a class="text-danger delete_event" data-eventno="1">
                                <i class="lni lni-trash-can"></i>
                              </a>
                            </div>
                          </td>
                        </tr>
                        <!-- end table row -->                       
                        
                      </tbody>
                    </table>
                    <!-- end table -->
                  </div>
                </div>
                <!-- end card -->
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== tables-wrapper end ========== -->
        </div>
        <!-- end container -->
      </section>
      <!-- ========== table components end ========== -->

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
    <script>
      $(function ($) {

        
        //on clicking delete

        $("#eventstable").on("click", ".delete_event", function (e) {
            e.preventDefault();

            var eventno = $(this).attr('data-eventno');

            closeButton = $('.bootbox').find('.bootbox-close-button');
            $('.bootbox').find('.modal-header').append(closeButton);

            bootbox.confirm({
            message: "Do you want to delete the event?",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                //
                $.ajax({
                  url: "delete_event.php",
                  type: "POST",
                  cache: false,
                  data:{
                    id: eventno
                  },
                  success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode==200)
                    {
                      bootbox.alert("The event was deleted successfully");
                    }
                  }
                });
            }
        });
        });
        
      })
    </script>
  </body>
</html>
