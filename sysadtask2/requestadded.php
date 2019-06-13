<html>
	<head>
		<title>Add Student</title>
	</head>

	<body>
<?php

//checking submission
if (isset($_POST['submit'])){
	
	$data_missing=array();

//uploading data
	if(empty($_POST['Allocated_Node_Name'])){
		$data_missing[]='Node1';} else { $n_name = $_POST['Allocated_Node_Name']; }

	if(empty($_POST['Starttime'])){
		$data_missing[]='00:00:00';} else { $s_time = $_POST['Starttime']; }

	if(empty($_POST['CPU_required'])){	
		$data_missing[]='0';} else { $c_req = $_POST['CPU_required']; }

	if(empty($_POST['Memory_required'])){
		$data_missing[]='0';} else { $m_req = $_POST['Memory_required']; }

	if(empty($_POST['Time_required_for_completion'])){
		$data_missing[]='0';} else { $t_req = $_POST['Time_required_for_completion']; }


	
}

//updating

	if(empty($data_missing)){


	require_once('mysql_connect.php');
		
	$query= "INSERT INTO REQUESTS(Allocated_Node_Name,Starttime,CPU_required, Memory_required , Time_required_for_completion) VALUES(?,?,?,?,?)";
	
	$stmt= mysqli_prepare($dbc,$query);
	
	mysqli_stmt_bind_param($stmt,"ssiii",$n_name,$s_time,$c_req,$m_req,$n_req);
 	
	mysqli_stmt_execute($stmt);	 
	
}
	require 'alloter.php';
?>
	</body>

</html>
