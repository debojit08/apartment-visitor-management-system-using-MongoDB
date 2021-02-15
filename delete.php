
<?php
//including the database connection file
include("db.php");
 $bulk=new MongoDB\Driver\BulkWrite;
 
//getting id of the data from url
try{
$id = $_GET['id'];

 
 $bulk->delete(['_id'=>new MongoDB\BSON\ObjectId($id)]);
 $res=$mng->executeBulkWrite('avms.user',$bulk);

header("Location: manage-newvisitors.php");
}
catch(MongoDB\Driver\Exception\Exception $e){
	die("Error exixts".$e);
}
?>

