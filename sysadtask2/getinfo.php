<?php

//Info of new Requests

require('mysql_connect.php');

$query = " SELECT id ,Allocated_Node_Name ,Starttime , CPU_required, Memory_required , Time_required_for_completion ,FROM REQUESTS" ;

$response = @mysqli_query($dbc,$query);

if($response){

	echo '<table align="left"
	cellspacing ="5" cellpadding="8">
	<tr>
	<td align="left" ><b>ID</b></td>
	<td align="left" ><b>Node Name</b></td>
	<td align="left" ><b>Start Time</b></td>
	<td align="left" ><b>CPUs Required</b></td>
	<td align="left" ><b>Memory Required</b></td>
	<td align="left" ><b>Time Required for Completion</b></td>
	</tr>';
	
while($row = mysqli_fetch_array($response)){

	echo '<tr>
	<td align="left" >'.$row['id'].'</td>
	<td align="left" >'.$row['Allocated_Node_Name'].'</td>
	<td align="left" >'.$row['Starttime'].'</td>
	<td align="left" >'.$row['CPU_required'].'</td>
	<td align="left" >'.$row['Memory_required'].'</td>
	<td align="left" >'.$row['Time_required_for_completion'].'</td>
	</tr>';}

echo '</table>';


}


mysqli_close($dbc);



?>
