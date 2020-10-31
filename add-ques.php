<?php
		include("connection.php"); 
		include("admin.php"); 

		$id = $_GET['id'];

		$sql = "SELECT * FROM subject WHERE id = '$id' ";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) 
			{
				while($row = $result->fetch_assoc()) 
				{
				   $subject = $row['name'];
				   //echo $subject;
				}
			}

		$message = "";
		if(isset($_POST['upload']))
		{
			$ques_id = isset($_POST['que_id'])?$_POST['que_id']:"";
			$ques = isset($_POST['que'])?$_POST['que']:"";
			$opt1 = isset($_POST['op1'])?$_POST['op1']:"";
			$opt2 = isset($_POST['op2'])?$_POST['op2']:"";
			$opt3 = isset($_POST['op3'])?$_POST['op3']:"";
			$opt4 = isset($_POST['op4'])?$_POST['op4']:""; 
			$ans = isset($_POST['answ'])?$_POST['answ']:""; 
			$sub = $subject;

			$sql = "INSERT INTO exam(subject, ques_id, ques, op1, op2, op3, op4, ans) 
			VALUES('".$sub."','".$ques_id."','".$ques."','".$opt1."','".$opt2."','".$opt3."','".$opt4."','".$ans."') ";

			if ($conn->query($sql) === true)
			{
				
			}else{
				$message = "Question Uploading Failed";
			}
		}
?>

<?php  echo $message;   ?>

	<div>
		<h2>ADD QUESTION IN <?php echo $subject; ?></h2>
		
		<div id="admin-ques-add">
			<form action="" method="POST">
				<table cellspacing="10px;">

					<tr>
						<td>
							<label>Question ID:</label>
						</td>
						<td colspan="9">
							<input type="text" name="que_id" class="input" style="width: 5%;">
						</td>
					</tr>

					<tr>
						<td>
							<label>Question:</label>
						</td>
						<td colspan="9">
							<input type="text" name="que" class="input" style="width: 100%;">
						</td>
					</tr>

					<tr>
						<td>
							<label>Option 1:</label>
						</td>
					
						<td>
							<input type="text" name="op1" class="input">
						</td>
					
						<td>
							<label>Option 2</label>
						</td>
					
						<td>
							<input type="text" name="op2" class="input">
						</td>
					
						<td>
							<label>Option 3:</label>
						</td>
					
						<td>
							<input type="text" name="op3" class="input">
						</td>
					
						<td>
							<label>Option 4:</label>
						</td>
					
						<td>
							<input type="text" name="op4" class="input">
						</td>

						<td>
							<label>Answer</label>
						</td>
					
						<td>
							<input type="text" name="answ" class="input">
						</td>
					</tr>

					<tr>
						<td colspan="9">
							<input type="submit" name="upload" value="Update Question" id="upload-button">
						</td>
					</tr>

				</table>
			</form>
		</div>
	</div>


	<div id="que-display">
			<form method="POST">
				<table cellspacing="20px">
					<tr>
						<th>Question ID</th>
						<th>Question</th>
						<th>Option 1</th>
						<th>Option 2</th>
						<th>Option 3</th>
						<th>Option 4</th>
						<th>Answer</th>
					</tr>

					<tr>
						<td colspan="8">
							<hr/>
						</td>
					</tr>

			<?php

					$sql = "SELECT * FROM exam WHERE subject = '$subject' order by ques_id desc";

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
									<?php echo $userdata['ques_id']; ?>
								</td>

								<td>
									<?php echo $userdata['ques']; ?>
								</td>

								<td>
									<?php echo $userdata['op1']; ?>
								</td>


								<td>
									<?php echo $userdata['op2']; ?>
								</td>


								<td>
									<?php echo $userdata['op3']; ?>
								</td>


								<td>
									<?php echo $userdata['op4']; ?>
								</td>
							
							
								<td>
									<?php echo $userdata['ans']; ?>
								</td>
						</tr>
			<?php
						}											
					}
			?>

					</table>	
				</form>
	</div>
