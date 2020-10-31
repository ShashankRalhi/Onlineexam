<script>
	$(document).ready(function(){
		$("#login").click(function(){
			//console.log("LOGIN PAGE");
			location = "login.php";
		});

		$("#register").click(function(){
			//console.log("REGISTRATION PAGE");
			location = "registration.php";
		});	

		$("#button").click(function(){
			location="logout.php";
		});

	});
</script>

		<div>
			<div>
				<?php
                    if( !isset($_SESSION['userdata']) )
                    {
                ?>                 
            	    <input type="button" name="login" value="LOGIN" id="login">
					<input type="button" name="registration" value="REGISTRATION" id="register">
			         
                <?php
                    }
                    else
                    {
                ?>
                        <input type="button" name="logout" value="logout" id="button" class="logout">
                        <!--<a href="logout.php"><li>Logout</li></a>-->
                <?php
                    }
                ?>
    		</div>
		</div>