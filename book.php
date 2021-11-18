<?php

	require('func/config.php');

    if(isset($_GET['id']))
    {
      $id = trim($_GET['id']);
      $event_query = "select * from events where Id = $id";
        $event = $event->fetch_events($event_query);
  
    }else {
     
      if(isset($_SERVER['HTTP_REFERER'])) {
        header('Location: '.$_SERVER['HTTP_REFERER']);
      }
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
    <title>Book Ticket | Laugh Industry</title>

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
                    onclick="window.open('signin.php')" 
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
                  <h2>Upcoming Event</h2>
                </div>
              </div>
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->
            <!-- ========= card-style-2 start ========= -->
            <div class="row">
            <?php foreach ($event as $item) :?>
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
                    <input type="hidden" value="<?php echo $item['EventName'];?>" id ="EventName"/>
                    <input type="hidden" value="<?php echo $item['VIPTicketCost'];?>" id ="VIPTicketCost"/>
                    <input type="hidden" value="<?php echo $item['RegularTicketCost'];?>" id ="RegularTicketCost" />
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div class="card-style-3 mb-30">
                  <div class="card-content">
                    <h4>Reserve your tickets!</h4>
                    <p>
                      With supporting text below as a natural 
                    </p>
                    <form id = "Bookeventform" novalidate>
                      <div class="input-style-1">
                        <label>Name</label>
                        <input type="text" placeholder="Your name" id ="Name" required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please provide your name</div>
                      </div>
                      <div class="input-style-1">
                        <label>Email</label>
                        <input type="text" placeholder="Your email" id ="Email" required/>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please provide your email</div>
                      </div>
                    
                      <!-- end input -->
                      <div class="input-style-1">
                        <label>VIP Tickets</label>
                        <input type="text" placeholder="VIP Tickets" id ="VIPTickets"required max="5"/>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please specify the number of tickets</div>
                      </div>
                      <div class="input-style-1">
                        <label>Regular Tickets</label>
                        <input type="text" placeholder="Regular Tickets" id ="RegularTickets" required max="5"/>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please specify the number of tickets</div>
                      </div>
                      <!-- end input -->
                      <div class="input-style-1">
                        <label>Total Amount To Pay</label>
                        <input type="text" placeholder="Total Amount" id ="TotalAmount" disabled = "true"/>
                      </div>
                      <!-- end input -->
                      <div class="col-12">
                          <button class="main-btn primary-btn btn-hover" id = "BookEvent">
                            Book Now
                          </button>
                        </div>
                  </form>
                  </div>
                </div>
              </div>
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
    <!-- <script src="assets/js/world-merc.js"></script> -->
    <script src="assets/js/polyfill.js"></script>
    <script src="assets/js/main.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
    <script src="assets/js/jbvalidator.min.js"></script>  
    <script src="assets/js/jquery.alphanum.js"></script>   
        <script>
            $(function (){
             
              $('#VIPTickets').numeric({
                maxPreDecimalPlaces: 10,
                maxDecimalPlaces: 0,
                max:5,
                min:0
              });
              $('#RegularTickets').numeric({
                maxPreDecimalPlaces: 10,
                maxDecimalPlaces: 0,
                max:5,
                min:0
              });

              $("#VIPTickets").keyup(function () {
                if ($("#VIPCapacity").val().length == 0) {
                    $("#TotalAmount").val('0');
                    return;
                }
                else {
                    if ($("#RegularTickets").val().length == 0) {
                        return;
                    } else {
                        var NoOfRegularTickets = parseFloat($("#RegularTickets").val(), 10);
                        var NoOfVIPTickets = parseFloat($("#VIPTickets").val(), 10);
                        var vipCost = parseFloat($("#VIPTicketCost").val(), 10);

                        if((NoOfRegularTickets + NoOfVIPTickets)>5)
                        {
                            //alert user & reset selection
                            bootbox.dialog({
                            message: 'You cannot book more than 5 tickets. Please select appropriately',
                            buttons: {
                              "success" : {
                                "label" : "OK",
                                "className" : "btn-sm btn-primary"
                              }
                            }
                          }); 
                          $("#RegularTickets").val("0");
                          $("#VIPTickets").val("0");
                          return;
                        }else{
                          var regularCost = parseFloat($("#RegularTicketCost").val(), 10);
                          var vipTotal = (NoOfVIPTickets * vipCost);
                          var regularTotal = (NoOfRegularTickets * regularCost);
                          $("#TotalAmount").val(vipTotal + regularTotal );
                        }                       
                        
                    }
                }
            });
            //

            $("#RegularTickets").keyup(function () {
                if ($("#RegularTickets").val().length == 0) {
                    $("#TotalCapacity").val('0');
                    return;
                }
                else {
                    if ($("#VIPTickets").val().length == 0) {
                        return;
                    } else {
                        var NoOfRegularTickets = parseFloat($("#RegularTickets").val(), 10);
                        var NoOfVIPTickets = parseFloat($("#VIPTickets").val(), 10);
                        var vipCost = parseFloat($("#VIPTicketCost").val(), 10);

                        if((NoOfRegularTickets + NoOfVIPTickets)>5)
                        {
                          bootbox.dialog({
                            message: 'You cannot book more than 5 tickets. Please select appropriately',
                            buttons: {
                              "success" : {
                                "label" : "OK",
                                "className" : "btn-sm btn-primary"
                              }
                            }
                          });
                          $("#RegularTickets").val("0");
                          $("#VIPTickets").val("0");
                          return;
                        }else{
                          
                          var regularCost = parseFloat($("#RegularTicketCost").val(), 10);
                          var vipTotal = (NoOfVIPTickets * vipCost);
                          var regularTotal = (NoOfRegularTickets * regularCost);
                          $("#TotalAmount").val(vipTotal + regularTotal );
                        }
                    }
                }
            });
            //
              //when save button is clicked
              $("#BookEvent").click(function (e) {
                  e.preventDefault();


                var form = $("#Bookeventform")
                if (form[0].checkValidity() === false) {
                    event.preventDefault()
                    event.stopPropagation()
                    form.addClass('was-validated');
                } else if (form[0].checkValidity() === true) 
                {

                  $.post('bookevent.php',
                  {
                    RegularTickets: $("#RegularTickets").val(),
                    VIPTickets: $("#VIPTickets").val(),
                    Email: $("#Email").val(),
                    Name: $("#Name").val(),
                    VIPTicketCost: $("#VIPTicketCost").val(),
                    RegularTicketCost: $("#RegularTicketCost").val(),
                    EventId: "<?php echo $_GET['id'];?>",
                    EventName:  $("#EventName").val()
                  },
                  function(data){                    

                    // var dataResult = JSON.parse(data);

                     console.log(data);

                    bootbox.dialog({
                      message: 'We have received your booking. Check your email for further instructions',
                      buttons: {
                        "success" : {
                          "label" : "OK",
                          "className" : "btn-sm btn-primary"
                        }
                      }
                    });                   

                  });

                }
                  
              });
               
            })
        </script> 
  </body>
</html>
