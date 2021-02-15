<?php
   // connect to mongodb
		
      $mng=new MongoDB\Driver\Manager("mongodb://localhost:27017");
      $query=new MongoDB\Driver\Query([]);

	$rows = $mng->executeQuery("avms.user", $query);
?>