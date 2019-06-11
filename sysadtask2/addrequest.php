<html>
	<head>
		<title>Add Student</title>

	<?php

		include 'getinfo.php';
	?>

	</head>

	<body>
		<form action ='http://localhost/requestadded.php' method ='post'>
				
		<b>Add Request</b>		
		<p>Node Name<input type="text" name = "Allocated_Node_Name"/></p>
		<p>Start Time HH-MM-SS-ss<input type="time" name = "Starttime"/></p>
		<p>CPUs Required<input type="number" name = "CPU_required"/></p>
		<p>Memory required<input type="number" name = "Memory_required"/></p>
		<p>Time Required<input type="number" name = "Time_required_for_completion"/></p>	
		<p><input type="submit" name="submit"/></p>

	</body>

</html>
