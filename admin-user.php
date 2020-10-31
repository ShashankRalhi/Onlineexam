<?php
		include("connection.php"); 
		include("admin.php"); 

		$message = "";
		$error = "";

		if(isset($_POST['submit']))
		{
			$name = isset($_POST['username'])?$_POST['username']:"";
			$email = isset($_POST['email'])?$_POST['email']:"";
			$pass = isset($_POST['passwordA'])?$_POST['passwordA']:"";
			$repass = isset($_POST['passwordB'])?$_POST['passwordB']:"";

			if($name || $email || $pass || $repass = "")
			{
				$message = "Please complete all details";
			}

				if($pass != $repass)
				{
					$message = "Password is not same please try again";
				}

					else
					{

						$sql = "SELECT * FROM registration WHERE email = '$email' ";
						$result = $conn->query($sql);
						
								if ($result->num_rows > 0) 
								{
									$message = "Email is already in use";
								}

										else
										{
											$sql = "INSERT into registration(name, email, password, DT) VALUES('".$name."','".$email."','".$pass."', NOW() )";

											if ($conn->query($sql) === true)
											{
												header('location:admin-user.php');						  		
											}

											else
											{
												$message = "Registartion Fail";
											}

										}
									$conn->close();			
					}
		}

		
		//print_r($_REQUEST);

?>
	
	<div>

			<div id="display">
				<form action="test.php" method="POST">
						<table id="userdisplay">
								<tr>
									<th>NAME</th>
									<th>EMAIL</th>
									<th>DATE/TIME</th>
								</tr>

								<tr>
									<td colspan="5">
										<hr/>
									</td>
								</tr>

								<?php

										$sql = "SELECT * FROM registration ORDER BY id DESC";

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
																<?php echo $userdata['email']; ?>
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
				</form>
		</div>




		<div id="admin-user-add">
			<form action="admin-user.php" method="POST">
				<table cellspacing="30px;">
					<tr>
						<td colspan="2">
							<?php echo $message; ?>
						</td>
					</tr>

					<tr>
						<td>
							<label for="username">User Name:</label>
						</td>
						<td>
							<input type="text" name="username" class="input">
						</td>
					</tr>

					<tr>
						<td>
							<label for="email">Email:</label>
						</td>
						<td>
							<input type="email" name="email" class="input">
						</td>
					</tr>


					<tr>
						<td>
							<label for="password">Password:</label>
						</td>
						<td>
							<input type="password" name="passwordA" class="input">
						</td>
					</tr>

					<tr>
						<td>
							<label for="password">Re-Password:</label>
						</td>
						<td>
							<input type="password" name="passwordB" class="input">
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

		
		

	










