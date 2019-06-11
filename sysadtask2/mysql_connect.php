<?php

/*Connecting*/

DEFINE ('DB_USER','Anirudh');
DEFINE ('DB_PASSWORD','Bjan12073');
DEFINE ('DB_HOST','localhost');
DEFINE ('DB_NAME','CERN');

$dbc = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

OR die ('Could Not Connect!!'.mysqli_connect_errorno());

?>
