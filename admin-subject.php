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

			<div id="display">
				<form action="admin-subject.php" method="POST">
						<table id="userdisplay">
								<tr>
									<th>SUBJECT NAME</th>
									<th>DATE/TIME</th>
									<th>ACTION</th>
								</tr>

								<tr>
									<td colspan="3">
										<hr/>
									</td>
								</tr>

								<?php

										$sql = "SELECT * FROM subject ORDER BY id DESC";

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
																<?php echo $userdata['name']; ?>
															</td>

															<td>
																<?php echo $userdata['dt']; ?>
															</td>
														
															<td>
																	<a href="add-ques.php?id=<?php echo $userdata['id']; ?>" name="select">Select</a>
															<!--	<a href="?delete&id=<?php echo $userdata['id']; ?>" name="delete">Delete</a>	-->
															</td>	 
															
																	<input type="hidden" name="userid" value="<?php echo $userdata['id']; ?>">
																<!--<input type="hidden" name="id" value="<?php //echo $id; ?>">-->
													</tr>
								<?php
											}											
										}
								?>

					</table>	
				</form>
		</div>




		<div id="admin-user-add">
			<form action="admin-subject.php" method="POST">
				<table cellspacing="30px;">
					<tr>
						<td colspan="2">
							<?php echo $message; ?>
						</td>
					</tr>

					<tr>
						<td>
							<label>Subject Name:</label>
						</td>
						<td>
							<input type="text" name="subjectname" class="input">
						</td>
					</tr>

					<tr>
						<td colspan="2">
							<input type="submit" name="submit" value="SUBMIT" id="submit-button">
						</td>
					</tr>

				</table>
			</form>
		</div>
	
	</div>
