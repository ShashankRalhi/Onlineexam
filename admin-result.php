<?php
		include("connection.php"); 
		include("admin.php"); 

		$message = "";
		$error = "";

		if(isset($_POST['submit']))
		{
			$name = isset($_POST['subjectname'])?$_POST['subjectname']:"";

			if($name == "")
			{
				$message = "Please complete all details";
			}

				else
				{

					$sql = "SELECT * FROM subject WHERE name = '$name' ";
					$result = $conn->query($sql);
					
							if ($result->num_rows > 0) 
							{
								$message = "Subject is already in uploaded";
							}

									else
									{
										$sql = "INSERT into subject(name,  DT) VALUES('".$name."', NOW() )";

										if ($conn->query($sql) === true)
										{
											header('location:admin-subject.php');						  		
										}

										else
										{
											$message = "Subject Uploading Failed";
										}

									}
								$conn->close();			
				}
		}

		
		//print_r($_REQUEST);

?>

	<div>

			<div id="display-result">
				
						<table id="userdisplay">
								<tr>
									<th>USER NAME</th>
									<th>SUBJECT</th>
									<th>RESULT</th>
									<th>DATE/TIME</th>
								</tr>

								<tr>
									<td colspan="4">
										<hr/>
									</td>
								</tr>

								<?php

										$sql = "SELECT * FROM result";

										$result = $conn->query($sql);

										$userdata = array();

										if ($result->num_rows > 0) 
										{	
											while($row = $result->fetch_assoc()) 
											{
													$userdata = $row;
								?>

													<tr>
									
															<td>
																<?php echo $userdata['username']; ?>
															</td>

															<td>
																<?php echo $userdata['subject']; ?>
															</td>

															<td>
																<?php echo $userdata['result']; ?>
															</td>

															<td>
																<?php echo $userdata['dt']; ?>
															</td>
										
													</tr>
								<?php
											}											
										}
								?>

					</table>	
				
		</div>	
	</div>
