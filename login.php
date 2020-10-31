<?php 
	
		session_start();

		include("header.php"); 

		include("navmenu.php");

		$message = "";
		$error = "";

		if(isset($_POST['submit']))
		{
			$email = isset($_POST['email'])?$_POST['email']:"";
			$pass = isset($_POST['passwordA'])?$_POST['passwordA']:"";

			if($email or $pass = "")
			{
				$message = "Please complete all details" ;
			}

			if($email === "admin@online.exam" && $pass == "admin")
			{
				header('location:admin-user.php');
			}

					else
					{

						$sql = "SELECT * FROM registration WHERE email='$email' AND password='$pass'";

						$result = $conn->query($sql);
								
								if ($result->num_rows > 0) 
								{	
				 						while($row = $result->fetch_assoc()) 
				 						{
				 							$_SESSION['userdata'] = array('name'=>$row['name'] , 'email'=>$row['email']);
				 						
				 							header('location:index.php');
										}
								}

								else
								{
									$message = "Please Enter Valid Detail";
								}			

						$conn->close();			
					
					}
		}
?>

		<div id="signin">
			<form action="login.php" method="POST">
				<table cellspacing="30px;">
					<th>SignIn</th>
					
					<tr>
						<td colspan="2">
							<?php echo $message; ?>
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
						<td colspan="2">
							<input type="submit" name="submit" value="SUBMIT" id="submit-button">
						</td>
					</tr>

				</table>
			</form>
		</div>

<?php include("footer.php"); ?>