<?php
session_start();
error_reporting(0);
include 'db.php';

if(isset($_POST['submit'])){ 
$cvmsaid=$_SESSION['cvmsaid'];
$date=$_POST['bdaytime'];
$time=$_POST['time'];
 $visname=$_POST['visname'];

$mobnumber=$_POST['mobilenumber'];

$city=$_POST['city'];
$street=$_POST['street'];
$zip=$_POST['zip'];
$vno=$_POST['vno'];
$apart=$_POST['apartment'];
$floor=$_POST['floor'];
$whomtomeet=$_POST['whomtomeet'];
$relation=$_POST['relation'];
$status=$_POST['status'];
$out=$_POST['bdaytime1'];
 
 //$query=mysqli_query($con,"insert into tblvisitor(VisitorName,MobileNumber,Address,WhomtoMeet,ReasontoMeet,Apartment,Floor) value('$visname','$mobnumber','$add','$whomtomeet','$reasontomeet','$apart','$floor')");

  // if ($query) {
 //   $msg="Visitors Detail has been added.";
//  }
 // else
  //  {
   //   $msg="Something Went Wrong. Please try again";
  //  }
//$dt=new MongoDB\BSON\UTCDateTime((new DateTime($today))->getTimestamp()*1000);
//$dt = new DateTime(date('Y-m-d'), new DateTimeZone('UTC'));
//$ts = $dt->getTimestamp();
//$today = new MongoDate($ts);
//$today = new MongoDate(strtotime(date('Y-m-d 00:00:00')));

// $date_created = new \MongoDB\BSON\UTCDateTime(time()*1000);
//$date_created = new Date(YYYY-mm-ddTHH:MM:ss);

 $bulkWrite=new MongoDB\Driver\BulkWrite;
    $doc=[
    "_id"=>new MongoDB\BSON\ObjectID,
    'VisitorName'=>$visname,
    'MobileNumber'=>$mobnumber,
    'Address'=>['City'=>$city,'Street'=>$street,'ZipCode'=>$zip],
    'VehicalNo'=>$vno,
    'visit'=>['ApartmentNo'=>$apart,
    'Floor'=>$floor,
    'WhomToMeet'=>$whomtomeet,
    'Relation'=>$relation,
    'EnterDate'=>$date,
    'EnterTime'=>$time], //startotime(date("r")),
    'Status'=>$status,
    'outtime'=>$out
    ];

$bulkWrite->insert($doc);
$mng->executeBulkWrite('avms.user',$bulkWrite); 
if($mng){
$msg="Visitors Detail has been added.";
 }
else
{
  $msg="Something Went Wrong. Please try again";
}
  
}
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
    <title>AVSM Visitors Forms</title>

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
                                        <strong>Add</strong> New Visitors
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Entry Date</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" id="bdaytime" name="bdaytime" class="form-control" required>
                                                    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Entry Time</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="time" id="time" name="time" class="form-control" required>
                                                    
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Visitor Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="visname" name="visname" placeholder="Visitor Name" class="form-control" required="true">
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Phone Number</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="mobilenumber" name="mobilenumber" placeholder="Mobile Number" class="form-control" maxlength="10" required="true">
                                                    
                                                </div>
                                            </div>
                                          
                                           <!--  <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Address</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="address" id="address" rows="9" placeholder="Enter Visitor Address..." class="form-control" required="true"></textarea>
                                                </div>
                                            </div>
 -->
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">City</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="city" name="city" placeholder="City Name" class="form-control" required="true">
                                                    
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Street</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="street" name="street" placeholder="Street" class="form-control" required="true">
                                                    
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Zip Code</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="zip" name="zip" placeholder="Zipcode" class="form-control" required="true">
                                                    
                                                </div>
                                            </div>

                                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Vehical No.</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="vno" name="vno" placeholder="Vehical No." class="form-control" required="true">
                                                    
                                                </div>
                                            </div>




                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Apartment no.</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="apartment" name="apartment" placeholder="Apartment no." class="form-control" required="true">
                                                    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Floor/Wing</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="floor" name="floor" placeholder="floor" class="form-control" required="true">
                                                    
                                                </div>
                                            </div>
                                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Whom to Meet</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="whomtomeet" name="whomtomeet" placeholder="Whom to Meet" class="form-control" required="true">
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Relation with that Person</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="relation" name="relation" placeholder="Relation with that Person" class="form-control" required="true">
                                                    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Status</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <!-- <input type="text" id="relation" name="status" placeholder="Status" class="form-control" required="true"> -->
                                                    <select id="status" name="status" class="form-control">
                                                        <option value="--select--">--SELECT--</option>
                                                                <option value="IN">IN</option>
                                                     </select>
                                                </div>
                                            </div>

                                             

                                            
                                          <div class="card-footer">
                                        <p style="text-align: center;"><button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm">Add
                                        </button></p>
                                        
                                    </div>
                                        </form>
                                    </div>
                                   
                                </div>
                       
                        </div>
                        
                    </div>
               
 
<?php include_once('includes/footer.php');?>
   </div> </div>
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
