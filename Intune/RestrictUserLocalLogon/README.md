<h1>Restrict local user logon by Microsoft Intune</h1>
If you want restrict local login devices only user who enrolled device, this tutorial is great solution for you.
<h2>Administrators local group</h2>
After the device is registered, you'll see the Azure AD user who registered the device in the Local Admins group and the <b>Global Administrator Role</b> and <b>Azure AD Device Administrator Role</b> groups that have access to device.<br/><br/>


![Intune1](https://user-images.githubusercontent.com/85555971/220875555-3d494c31-a666-4bba-9ec6-a8b2a617a83d.jpg)

<h2>Script to add new local group, move Azure AD user that group</h2>

- Browse to <b>Devices -> Script</b><br/>
- Click <b>ADD</b><br/>
- Select <b>Windows 10 and later</b><br/>
- Write <b>Name</b> and optional description<br/>

![Screenshot](https://user-images.githubusercontent.com/85555971/220884546-527ffd34-723b-494d-8858-9ad67c6455e8.jpg)

- Upload script from repository<br/>
- Select <b>Run script in 64 bit PowerShell Host</b><br/>

![Screenshot2](https://user-images.githubusercontent.com/85555971/220885612-b61f206a-f0f4-4a0d-bad5-6b94da6cdded.jpg)

- Add groups where is that device and finally click <b>Create</b></b><br/>

![Screenshot22](https://user-images.githubusercontent.com/85555971/220885268-c091ced6-5003-461a-aa1b-44314ae253bf.jpg)

<h2>Results after installing the script</h2>
If the script is successful, you'll see <b>Succeeded</b> in Microsoft Intune, and you'll see the <b>Intune</b> group and the user who enrolled the device in your local group.<br/><br/>

![Intune2](https://user-images.githubusercontent.com/85555971/220913171-c57638d0-6264-492c-98c3-858525157650.jpg)

<h2>Now we need to restrict the local logon to only specific groups</h2>

- Browse to <b>Devices -> Configuration profiles</b><br/>
- Click <b>Create profile</b><br/>
- Select platform <b>Windows 10 and later</b><br/>
- Select profile type <b>Templates -> Cutom</b><br/>
- Click <b>Create</b><br/>

![Screenshot4](https://user-images.githubusercontent.com/85555971/220895843-1706f9ec-e719-43a9-8ad5-892b6200aca6.jpg)

- Write <b>Name</b> and optional description<br/>

![Screenshot5](https://user-images.githubusercontent.com/85555971/220896356-21e94a20-c310-4634-9094-10dd024905c7.jpg)

- Name:  ```Allow local logon ```
- Description:  ```Optional value ```
- OMA-URI:  ```./Device/Vendor/MSFT/Policy/Config/UserRights/AllowLocalLogOn ```
- Data type:  ```String ```
- Value: ```*S-1-5-32-544*S-1-5-32-546Intune```

![Screenshot8](https://user-images.githubusercontent.com/85555971/220913448-208a69d0-856e-47a4-8469-e958eaa51781.jpg)

- Name: ```Deny local logon```
- Description:  ```Optional value ```
- OMA-URI: ```./Device/Vendor/MSFT/Policy/Config/UserRights/DenyLocalLogOn```
- Data type:  ```String ```
- Value: ```</>```

![Screenshot7](https://user-images.githubusercontent.com/85555971/220913500-f3e3d898-3781-4f7a-afdb-3221120406a0.jpg)

- Name: ```MDM Wins Over Policy```
- Description:  ```Optional value ```
- OMA-URI: ```./Device/Vendor/MSFT/Policy/Config/ControlPolicyConflict/MDMWinsOverGP```
- Data type: ```Integer```
- Value: ```1```

![Screenshot9](https://user-images.githubusercontent.com/85555971/220913568-ebcd2136-a5fd-46dc-8dad-c21beefc610f.jpg)

- Add groups where is that device and finally click <b>Create</b><br/>

![Screenshot13](https://user-images.githubusercontent.com/85555971/220907535-9f521307-f2ca-4f57-9cb1-f81ad02bfde6.jpg)

<h2>Allow and Deny local logon</h2>
If the configuration profile is successful, you'll see <b>Succeeded</b> in Microsoft Intune. In local device you'll check value in local group policy. Click <b>Windows + R -> Gpedit.msc - > Computer Configuration -> Windows Settings -> Security Settings -> Local Policies -> User Right Assignment</b>.<br/> <br/> 

![Intune4](https://user-images.githubusercontent.com/85555971/220901937-91366a07-6404-4031-beae-5bce4e974740.jpg)

<h2>Final score</h2>
The end result is only  users in the <b>Administrators, Guest, and Intune</b> groups can sign in.<br/><br/>

![Intune5](https://user-images.githubusercontent.com/85555971/220902316-c2787b61-ec6d-4f4e-9be2-274aab995f6e.jpg)


<h2>Add new user  from Microsoft Intune</h2>
- Browse to <b>Endpoint Security -> Account protection</b><br/>
- Click <b>Create Policy</b><br/>
- Select platform <b>Windows 10 and later</b><br/>
- Select <b>Local user group membership as Profile</b><br/>
- Click <b>Create</b><br/><br/>

![Screenshot10](https://user-images.githubusercontent.com/85555971/220907829-8e3432d9-217a-4a96-85de-e7895f52f1ed.jpg)

- Name <b>Local user membership</b><br/>
- Description <b>Optional value</b><br/>

![Screenshot11](https://user-images.githubusercontent.com/85555971/220907836-ad1a6b46-267e-40f0-a742-7e41abbfe86b.jpg)

- Select group <b>Guest or Administrators</b><br/>
- Group and user action <b>Add (update)</b><br/>
- User selection type <b>Users/Group</b><br/>
- Selected users/groups <b>Select users or groups</b><br/>

![Screenshot12](https://user-images.githubusercontent.com/85555971/220907998-e105ba98-d9f4-4475-822f-2686d5553436.jpg)


- Add groups where is that device and finally click <b>Create</b><br/>

![Screenshot13](https://user-images.githubusercontent.com/85555971/220907535-9f521307-f2ca-4f57-9cb1-f81ad02bfde6.jpg)


![Screenshot14](https://user-images.githubusercontent.com/85555971/220911069-83fbd2c7-4043-4258-aff3-12af4ed89a70.jpg)
