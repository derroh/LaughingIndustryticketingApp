<?php

	require('func/config.php');

	// if(!$user->is_logged_in()){
	// 	header('Location: signin.php');
  // }

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
    <title>Create Event | Laugh Industry</title>

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

      <!-- ========== tab components start ========== -->
      <section class="tab-components">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title mb-30">
                  <h2>Add New Event</h2>
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
                      <li class="breadcrumb-item"><a href="#0">Events</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                      Add New Event
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

          <!-- ========== form-elements-wrapper start ========== -->
          <div class="form-elements-wrapper">
            <div class="row">
              <div class="col-lg-12">
                <!-- input style start -->
                <div class="card-style mb-30">
                  <h6 class="mb-25">Input Fields</h6>
                  <form id = "eventform">
                  <div class="input-style-1">
                    <label>Event Name</label>
                    <input type="text" placeholder="Event Name" id ="EventName" />
                  </div>
                  <div class="input-style-1">
                    <label>Location</label>
                    <input type="text" placeholder="Location" id ="Location" />
                  </div>

                  <div class="input-style-1">
                    <label>Date</label>
                    <input type="date" id ="Date"/>
                  </div>
                  <!-- end input -->
                  <div class="input-style-2">
                    <label>Event Time</label>
                    <input type="time" id ="EventTime"/>
                  </div>
                  <!-- end input -->
                  <div class="input-style-1">
                    <label>Total Capacity</label>
                    <input type="text" placeholder="Total Capacity" id ="TotalCapacity"/>
                  </div>
                  <!-- end input -->
                  <div class="input-style-1">
                    <label>VIP Capacity</label>
                    <input type="text" placeholder="VIP Capacity" id ="VIPCapacity" />
                  </div>
                  <div class="input-style-1">
                    <label>Regular Capacity</label>
                    <input type="text" placeholder="Regular Capacity" id ="RegularCapacity" />
                  </div>
                  <!-- end input -->
                  <div class="input-style-1">
                    <label>VIP Ticket Cost</label>
                    <input type="text" placeholder="VIP Ticket Cost" id ="VIPTicketCost"/>
                  </div>
                  <div class="input-style-1">
                    <label>Regular Ticket Cost</label>
                    <input type="text" placeholder="Regular Ticket Cost" id ="RegularTicketCost" />
                  </div>
                  <!-- end input -->
                  <div class="col-12">
                      <button class="main-btn primary-btn btn-hover" id = "SaveEvent">
                        Save
                      </button>
                    </div>
                  </form>
                </div>
                <!-- end card -->
                <!-- ======= input switch style end ======= -->
              </div>              
            </div>
            <!-- end row -->
          </div>
          <!-- ========== form-elements-wrapper end ========== -->
        </div>
        <!-- end container -->
      </section>
      <!-- ========== tab components end ========== -->

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
    <script src="assets/js/jbvalidator.min.js"></script>  
        <script>
            $(function (){

              //when save button is clicked
              $("#SaveEvent").click(function (e) {
                  e.preventDefault();

                  //send to php file using AJAX
                  $.post('saveevent.php',
                  {
                    EventName: $("#EventName").val(),
                    Location: $("#Location").val(),
                    Date: $("#Date").val(),
                    EventTime: $("#EventTime").val(),
                    TotalCapacity: $("#TotalCapacity").val(),
                    VIPCapacity: $("#VIPCapacity").val(),
                    RegularCapacity: $("#RegularCapacity").val(),
                    VIPTicketCost: $("#VIPTicketCost").val(),
                    RegularTicketCost: $("#RegularTicketCost").val()
                  },
                  function(data){

                    var dataResult = JSON.parse(data);

                    if(dataResult.statusCode==200)
                    {
                      bootbox.dialog({
                      message: 'Saved successfully',
                      buttons: {
                        "success" : {
                          "label" : "OK",
                          "className" : "btn-sm btn-primary"
                        }
                      }
                    });	

                    }
                    else if(dataResult.statusCode==201)
                    {
                      bootbox.dialog({
                      message: 'Data was not saved',
                      buttons: {
                        "success" : {
                          "label" : "OK",
                          "className" : "btn-sm btn-primary"
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
