<?php
/*
Role Based Access Control to system

//permission
0 0 0 0 0 0 0 1 - Access system 1

0 0 0 0 0 0 1 0 - Write logs 2 
0 0 0 0 0 1 0 0 - Read logs  4

0 0 0 0 1 0 0 0 - Write Users  8
0 0 0 1 0 0 0 0 - Read Users 16

0 0 1 0 0 0 0 0 - Write Settings 32
0 1 0 0 0 0 0 0 - Read Settings 64

//person 
user = 1;
guest = 1 | 4;	
moderator =  1 | 2 | 4 | 16;
admin = 1 | 2 | 4 | 8 | 16 | 32 | 64;	

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