<?php 
		session_start();

		include("header.php"); 

		//Fetch id from url which is send from some other page
		
		$id = $_GET['id']; 
		
		$sql = "SELECT * FROM subject WHERE id = '$id' ";
		
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
			{
			   $subject = $row['name'];
			}
		}



		$count = 0;
		$num = 1;
		
		if(isset($_POST['next']))
		{
			if($num>=1 || $num<=10)
			{
				$sql = "SELECT * FROM exam WHERE subject = '$subject' AND ques_id = '$num' "; 

				$result = $conn->query($sql);
			
				if ($result->num_rows > 0) 
				{	
					while($row = $result->fetch_assoc()) 
					{
						$answer = $row['ans'];

						$ans = $_POST['option'];

						if( $answer === $ans)
						{
							$count++;
						}
					}											
				}

					$num+=1;
			}
		}


		// if(isset($_POST['prev']))
		// {

		// 	if($num<=10)
		// 	{
		// 		$num--;

		// 		$sql = "SELECT * FROM exam WHERE subject = '$subject' AND ques_id = '$num' "; 
			
		// 		$num+=1;
			
		// 		$result = $conn->query($sql);
				
		// 		if ($result->num_rows > 0) 
		// 		{	
		// 			while($row = $result->fetch_assoc()) 
		// 			{
		// 				$answer = $row['ans'];
		// 			}											
		// 		}

		// 		$ans = $_POST['option'];

		// 			if( $answer == $ans)
		// 			{
		// 				$count+=1;
		// 			}

		// 			else
		// 			{
		// 				$count;
		// 			}
		// 	}
			
		// 	else{		
		// 	}
		// }
		

		if(isset($_POST['done']))
		{
			if($count>=1 || $count<=2)
			{
					$sql = "INSERT into result(username, subject, result, dt) 
					VALUES('".$_SESSION['userdata']['name']."', '".$subject."', 'PASS', NOW() )";

					if ($conn->query($sql) === true)
					{
						header('location:result.php');						  		
					}
			}
			
			else
			{			
?>
				
				<script type="text/javascript">
					
					$(document).ready(function()
					{
						alert("Sorry You are Fail Please Try Again");
						location='index.php';						  			
					});

				</script>

<?php
			}
		}	
?>

<div>
	<div id="user-login-data">
		<table cellspacing="10px">
			<tr>
				<td>
					<label>Name:</label>
					<?php echo $_SESSION['userdata']['name'];?>
				</td>
				<td>
					<label>Email:</label>
					<?php echo $_SESSION['userdata']['email'];?>
				 </td>
				<td>
					<?php include("navmenu.php"); ?>
				</td>
			</tr>

		<!--	<tr>
					<td colspan="2">
						<input type="button" name="logout" value="logout" id="button">
					</td>
			</tr>
		-->

		</table>
	</div>



	<div id="user-subject-exam">
				<form  method="POST">
						<table cellspacing="20%">
								
								<tr>
									<th id="left"><?php echo $subject; ?> Test</th>
								</tr>

								<tr>
									<td colspan="3">
										<hr/>
									</td>
								</tr>

								<?php

										$sql = "SELECT * FROM exam WHERE subject = '$subject' AND ques_id = '$num' ";

										$result = $conn->query($sql);

										$userdata = array();

										if ($result->num_rows > 0) 
										{	
											while($row = $result->fetch_assoc()) 
											{
													$userdata = $row;
								?>

													<tr>																
															<td id="left">
																<?php echo $num."."; ?>
																<?php echo $userdata['ques']; ?>
															<br><br>
																<input type="radio" name="option" value="<?php echo $userdata['op1']; ?>">
																<?php echo $userdata['op1']; ?>
															<br>
																<input type="radio" name="option" value="<?php echo $userdata['op2']; ?>">
																<?php echo $userdata['op2']; ?>
															<br>
																<input type="radio" name="option" value="<?php echo $userdata['op3']; ?>">
																<?php echo $userdata['op3']; ?>
															<br>
																<input type="radio" name="option" value="<?php echo $userdata['op2']; ?>">
																<?php echo $userdata['op4']; ?>		
															</td>
													</tr>
								<?php
											}											
										}
								?>
													<tr>
														<td>				
															<?php
																if($num<10)
																{
														 	?>
																	<input type="submit" name="prev" value="previous" class="funbutton">
																	<input type="submit" name="next" value="next" class="funbutton">
														    <?php
																}
																if($num==10)
																{
															?>
																	<input type="submit" name="prev" value="previous" class="funbutton">
																	<input type="submit" name="done" value="done" class="funbutton">
															<?php
																}
															?>
														</td>
													</tr>
					</table>	
				</form>
	</div>
</div>

