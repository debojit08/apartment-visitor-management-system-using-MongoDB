<?php
session_start();
error_reporting(0);



  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>AVMS</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
      <?php include_once('includes/sidebar.php');?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
      
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include_once('includes/header.php');?>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    
                                <div class="card-header" >
                                        <strong>Visitors</strong> Dates Reports
                                    </div>
<?php
$date = $_POST['fromdate'];
echo"<p align='center' style='color: red'>Result against' $date 'dates </p>";
?>
<table class=table table-borderless table-striped table-earning>
                                         <thead>
                                        <tr>
                                            <tr>
                  
                                 <th>SL</th>           
                  <th>Visitor Name</th>
              
              <th>Contact Number</th>
              <th>Whom To Visit</th>
              <th>Apartment No.</th>
              <th>Status</th>
              
                   <th>Action</th>
                   <th>Delete</th>
                </tr>
                                        </tr>
                                        </thead>
<?php
                                    $mng=new MongoDB\Driver\Manager("mongodb://localhost:27017");
                                    $query=new MongoDB\Driver\Query([]);
                                    if(isset($_POST['submit'])){
                                     $date = $_POST['fromdate'];
                                     // $flag = 0;
                                      $i=1;
                                      foreach ($rows as $row){
                                         $id = $row->_id;
                                        if($date==$row->visit->EnterDate){
                                                    //$flag = 1;
                                                   //echo"<p align='center' style='color: red'>Result against' $date 'keyword </p>";
                                                  //}

                                    //if($flag==1){
                                  

    echo"<tr>";
    echo"<td>".$i."</td>";
    echo"<td>".$row->VisitorName."</td>";
    echo"<td>".$row->MobileNumber."</td>";
    echo"<td>".$row->visit->WhomToMeet."</td>";
    echo"<td>".$row->visit->ApartmentNo."</td>";
    echo"<td>".$row->Status."</td>";
    echo"<td><a href=\"visitor-detail.php?id=$id\" title=\"View Full Details\"><i class=\"fa fa-edit fa-1x\"></i></a></td>";
    echo"<td><a href=\"delete.php?id=$row->_id\" title=\"Delete\"><i class=\"fa fa-trash fa-1x\"></i></a></td>";
    echo "</tr>";
                        //break;
                          }
                          $i++;
                        }
                     //if($flag==0)
                     
                 echo "</table>";
                                                  
            }
         ?>
                                </div>
                            </div>
                          
                        </div>
                        
                        
          
<?php include_once('includes/footer.php');?>
          </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>

