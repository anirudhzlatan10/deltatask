<?php

require('mysql_connect.php');

//getting both node and request tables

$query = " SELECT id ,Name ,Number_of_CPUs , Availabe_CPUs, Memory_Size , Availale_Memory ,FROM NODES" ;

$query2 = " SELECT id ,Allocated_Node_Name ,Starttime , CPU_required, Memory_required , Time_required_for_completion ,FROM REQUESTS" ;

$check = @mysqli_query($dbc,$query);

$response = @mysqli_query($dbc,$query2);


if($reaponse){

	$row_req=  mysqli_fetch_array($response);

	if($check){

		$avbt = @mysqli_fetch_array($check);
		$flag=1;
		$id=1;

//going through the nodes
		
for($x=1;$x<5;$x++){

$q=" SELECT Availabe_CPUs,Availale_Memory FROM NODES WHERE Name IS Cern".$x;

$q_stmt = @mysqli_query($dbc,$q);

//checking availability
if(($q_stmt['Availabe_CPUs']>= $query2['CPU_required'])&&($q_stmt['Availale_Memory']>=$query2['Memory_required'])) 
	{ $new_cpu = $q_stmt['Availabe_CPUs']-$query2['CPU_required'];
	  $new_mem = $q_stmt['Availale_Memory']-$query2['Memory_required'];
	$query4 = "REPLACE INTO NODES(Availabe_CPUs,Availale_Memory) VALUES(?,?)";
	$stmt = mysqli_prepare($dbc,$query4);
	mysqli_stmt_bind_param($stmt,"ii",$new_cpu,$new_mem);
	mysqli_stmt_execute($stmt);
	$flag=0; echo "The request is trasferred to Node".$x;
	


//updating history
	$query3=" SELECT Starttime , CPU_required, Memory_required , Time_required_for_completion ,FROM CERN".$x;
	$cpu=$query2['CPU_required'];$st_time=$query2['Starttime'];$mem=$query2['Memory_required'];	                $comp_time=$query2['Time_required_for_completion'];
	$query5 = "REPLACE INTO CERN$x(Starttime,CPU_required,Memory_required,Time_required_for_completion) VALUES(?,?,?,?)";
	$stmt2 = mysqli_prepare($dbc,$query5);
	mysqli_stmt_bind_param($stmt2,"siii",$st_time,$cpu,$mem,$comp_time);
	mysqli_stmt_execute($stmt2);
}

if($flag){goto here;}
break();

here:

}


} 
mysqli_close($dbc);

?>
