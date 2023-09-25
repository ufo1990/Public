<?php

session_start();

//Include function from Role-based-access-control.php
require('../Role-based-access-control.php'); 

$_SESSION['roles'] = bindec(1011111);

//Inlucde function rbac	
roleBasedAccessControl(64, $_SESSION['roles']);

?>
<!DOCTYPE html>
<html>
	<body>
		<form action="" <?= $visibity ?> method="post">
		  <input type="text" name="fname" placeholder="First name:"><br />
		  <input type="text" name="lname" placeholder="Last name:"><br /><br />
		  <input <?= $visibity ?> type="submit" value="Submit">
		</form> 
	</body>
</html>