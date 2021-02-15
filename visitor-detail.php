<?php
session_start();
error_reporting(0);
include 'db.php';
$msg="";
 

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
    <title>AVSM Visitors Details</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
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
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                          
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Visitor</strong>  Details
                                    </div>
                                    <div class="card-body card-block">
                                        
                                            <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
<table border="1" class="table table-bordered mg-b-0">
<?php
 $query=new MongoDB\Driver\Query([]);
//  //$bulkWrite=new MongoDB\Driver\BulkWrite;
//  //$mng->executeBulkWrite('avms.user',$bulkWrite); 
 $rows=$mng->executeQuery("avms.user",$query);
  // foreach ($rows as $row) {
  //   echo"$row->VisitorName";
  // }
//foreach($rows as $row)
 $id = $_GET['id'];
 
foreach($rows as $row){
  if($row->_id == $id )
  {
  echo"<tr>".

    "<th>Entry Date</th>".
     //"<td>".$row->EnterDate."</td>".
     "<td>".$row->visit->EnterDate."</td>".
  "</tr>";

  echo"<tr>".

  "<th>Entry Time</th>".
   //"<td>".$row->EnterDate."</td>".
   "<td>".$row->visit->EnterTime."</td>".
"</tr>";


  echo"<tr>".

    "<th>Visitor Name</th>".
     "<td>".$row->VisitorName."</td>".
  "</tr>";

 echo"<tr>".
     "<th>Mobile Number</th>".
    "<td>".$row->MobileNumber."</td>".
   "</tr>";

   echo"<tr>".
     "<th>City</th>".
     "<td>".$row->Address->City."</td>".
   "</tr>";

   echo"<tr>".
     "<th>Street</th>".
     "<td>".$row->Address->Street."</td>".
   "</tr>";

   echo"<tr>".
     "<th>Zip</th>".
     "<td>".$row->Address->ZipCode."</td>".
  "</tr>";

echo"<tr>".
     "<th>Vehical No</th>".
   "<td>".$row->VehicalNo."</td>".
  "</tr>";

   echo"<tr>".
     "<th>Apartment No</th>".
     "<td>".$row->visit->ApartmentNo."</td>".
   "</tr>";

   echo"<tr>".
     "<th>Floor</th>".
     "<td>".$row->visit->Floor."</td>".
   "</tr>";

   echo"<tr>".
     "<th>Whom To Meet</th>".
     "<td>".$row->visit->WhomToMeet."</td>".
   "</tr>";

   echo"<tr>".
     "<th>Relation with that Person</th>".
     "<td>".$row->visit->Relation."</td>".
   "</tr>";  
   echo"<tr>".
     "<th>Status</th>".
     "<td>".$row->Status."</td>".
   "</tr>";

  //if($row['remark']==""){
  //  echo "<form method=\"post\">";
  //        echo"<tr>";
  //   echo "<th>Outing Remark :</th>";
  //   echo"<td><textarea name=\"remark\" placeholder=\"\" rows=\"12\" cols=\"14\" class=\"form-control wd-450\" required=\"true\"></textarea></td>";
  // echo"</tr>";                               
 

   echo"<tr>";
   if($row->outtime==""){
   echo"<td colspan=\"2\"><a class=\"btn\" href='update-visitor.php?id=".$row->_id."&status=".$row->Status."'>UPDATE</a></td>";
 echo"</tr>";
   }
   else
   {
    echo"<tr>".
    "<th>Outing DateTime</th>".
    "<td>".$row->outtime."</td>".
  "</tr>";
   }
 echo "</form>";
 }
  }
?>
 
</table>


                      
                                    </div>
                                   
                                </div>
                       
                        </div>
                            </div>
    
<?php include_once('includes/footer.php');?>
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
<!-- end document-->