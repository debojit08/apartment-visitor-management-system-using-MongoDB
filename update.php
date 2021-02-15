<?php
include 'db.php';
$bulk=new MongoDB\Driver\BulkWrite;
$status=$_POST['status'];
$out=$_POST['bdaytime1'];
foreach($rows as $row){
    $id=$row->_id;
try{
    $bulk->update(
        ['Status' => "IN"],
        ['$set' => ['Status' => $status ,'outtime'=> $out]]);   
    $mng=new MongoDB\Driver\Manager('mongodb://localhost:27017');
    $res=$mng->executeBulkWrite('avms.user',$bulk);
    header("Location: manage-newvisitors.php?id=$id");

}
catch(MongoDB\Driver\Exception\Exception $e){
    die("error".$e);
}
}

?>
