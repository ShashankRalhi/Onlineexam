<?php

		session_start();

		include("header.php");
		include("navmenu.php");

			$sql = "SELECT * FROM result WHERE username = '".$_SESSION['userdata']['name']."' ";
		
			$result = $conn->query($sql);
		
			if ($result->num_rows > 0) 
			{	
				while($row = $result->fetch_assoc()) 
				{
					$username = $row['username'];
					$subject = $row['subject'];
					$fresult = $row['result'];
					$date= $row['dt'];
				}											
			}					
?>


<div id="op">
	<div><label>User Name:</label><?php echo " ".$username; ?></div>
	<div><label>Subject:</label><?php echo " ".$subject; ?></div>
	<div><label>Result:</label><?php echo " ".$fresult; ?></div>
	<div><label>Date/Time:</label><?php echo " ".$date; ?></div>
</div>