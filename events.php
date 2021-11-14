<?php

	require('func/config.php');

	// if(!$user->is_logged_in()){
	// 	header('Location: signin.php');
  // }
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
                          <th><h6>Event name</h6></th>
                          <th><h6>Location</h6></th>
                          <th><h6>Date</h6></th>
                          <th><h6>VIP ticket Amount</h6></th>
                          <th><h6>Regular ticket Amount</h6></th>
                          <th><h6>VIP Capacity</h6></th>
                          <th><h6>Regular Capacity</h6></th>
                          <th><h6>Action</h6></th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <tbody>
                    <?php if ( empty($events_list) ): ?>
                        <div class="col-xs-12">
                            <div class="alert alert-warning">
                              <span class="glyphicon glyphicon-info-sign"></span> &nbsp; No items found...
                            </div>
                        </div>

                    <?php else: ?>

                      <?php foreach ($events_list as $item) :?>
                        <tr>
                          <td class="min-width">
                            <div class="lead">                            
                              <div class="lead-text">
                                <p><?php echo $item['EventName'];?></p>
                              </div>
                            </div>
                          </td>
                          <td class="min-width">
                            <p><?php echo $item['Location'];?></p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $item['Date'];?></p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $item['VIPTicketCost'];?></p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $item['RegularTicketCost'];?></p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $item['VIPCapacity'];?></p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $item['RegularCapacity'];?></p>
                          </td>
                          <td>
                            <div class="action">
                            <a class="text-primary" href ="edit-event.php?id=<?php echo $item['Id'];?>" data-bs-toggle="tooltip" data-bs-placement="top"  title="Edit">
                                <i class="lni lni-pencil"></i>
                              </a>
                              &nbsp;
                              <a class="text-danger delete_event" data-eventno="<?php echo $item['Id'];?>" data-bs-toggle="tooltip" data-bs-placement="top"  title="Delete">
                                <i class="lni lni-trash-can"></i>
                              </a>
                              
                            </div>
                          </td>
                        </tr>
                        <?php endforeach; ?>

                    <?php endif;?>                        
                        
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
    <script>
      $(function ($) {

        
        //on clicking delete

        $("#eventstable").on("click", ".delete_event", function (e) {
            e.preventDefault();

            var eventno = $(this).attr('data-eventno');

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
            callback: function (result) 
            {
   
              $.post('delete_event.php', { 'delete':eventno })
							.done(function(response)
              {								
								//rload page
							
                console.log(response);

                var dataResult = JSON.parse(response);

                if(dataResult.statusCode==200)
                {
                  bootbox.dialog({
                  message: 'Deleted successfully',
                  buttons: {
                    "success" : {
                      "label" : "OK",
                      "className" : "btn-sm btn-primary"
                    }
                  }
                });	

                window.setTimeout(function(){
									location.reload()
								}, 1000)

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
							})
							.fail(function(){
								bootbox.alert('Something Went Wrog ....');
							})
            }
        });
        });
        
      })
    </script>
  </body>
</html>
