<?php
/*
Role Based Access Control to system

//Permissions
0 0 0 0 0 0 1 - Access system
0 0 0 0 0 1 0 - Write logs
0 0 0 0 1 0 0 - Read logs
0 0 0 1 0 0 0 - Write Users
0 0 1 0 0 0 0 - Read Users
0 1 0 0 0 0 0 - Write Settings
1 0 0 0 0 0 0 - Read Settings

*/

function roleBasedAccessControl($permission, $person)
{
	global $visibity;	
	
	switch($permission & $person){
		case 0:	
			echo "You do not have permission to this content!";
			exit();
			break;
		case(($person >> strlen((decbin($permission >> 1)) -1)) & 1) == 0:
			echo "Restricted read-only permissions.";
			$visibity = "disabled=disabled";
			break;
		default:
			return true;		
	}
}