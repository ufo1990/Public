<h1>Role Based Access Control</h1>
Simply PHP Role Based Access Control to content by Bitwise Operators
<h2>Usage</h2>
In database you have to have column <strong>Roles</strong> , add a parameter <code>bindec($row['roles'] >> 0)) & 1) == 1 </code> to your user login checker.  Then assign for example to <code>$_SESSION['roles'] = bindec($row['roles']); </code>
<br /><br />

![sql](https://github.com/ufo1990/Public/assets/85555971/646ad16b-ccef-4420-9477-8256562c1ffa)            


<h3>Permissions</h3>
<strong>0 0 0 0 0 0 1</strong> - Access system <br />
<strong>0 0 0 0 0 1 0</strong> - Write logs  <br />
<strong>0 0 0 0 1 0 0</strong> - Read logs <br />
<strong>0 0 0 1 0 0 0</strong> - Write Users <br /> 
<strong>0 0 1 0 0 0 0</strong> - Read Users <br />
<strong>0 1 0 0 0 0 0</strong> - Write Settings <br />
<strong>1 0 0 0 0 0 0</strong> - Read Settings <br />

## Code Examples
Function check user permissions if conjunction equal 0 then user doesn't have access to content. 

For example if user has roles <strong>1011111</strong> and  we will add the code 
<code>roleBasedAccessControl(64, $_SESSION['roles']</code>. User will be able to read content but will not be able te write data because bit in the previesly postion is 0.