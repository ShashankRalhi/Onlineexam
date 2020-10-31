<?php 
	session_start();

	include("header.php"); 
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
									<th id="left">SUBJECT</th>
									<th id="right">TEST</th>
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
									
															<td id="left">
																<?php echo $userdata['name']; ?>
															</td>
														
															<td id="right">
																	<a href="test.php?id=<?php echo $userdata['id']; ?>" name="select">Select</a>
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

</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#button").click(function(){
			location="logout.php";
		})
	})
</script>