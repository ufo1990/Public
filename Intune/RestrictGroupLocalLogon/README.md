<h1>Restrict local group logon  by Microsoft Intune</h1>
If you want restrict local login devices only specific groups, this tutorial is great solution for you.

<h2>Restrict the local logon to only specific groups</h2>

- Browse to <b>Devices -> Configuration profiles</b><br/>
- Click <b>Create profile</b><br/>
- Select platform <b>Windows 10 and later</b><br/>
- Select profile type <b>Templates -> Cutom</b><br/>
- Click <b>Create</b><br/>

![220895843-1706f9ec-e719-43a9-8ad22225-892b6200aca6](https://user-images.githubusercontent.com/85555971/220934539-5df6f473-bb5f-47d6-b0cf-3ae786f8efa2.jpg)

- Write <b>Name</b> and optional description<br/>

![220884546-527ffd34-723b-494d-8858-9ad67c6455e8](https://user-images.githubusercontent.com/85555971/220934216-39758eda-814c-4b37-b5f0-2fcddc20e97d.jpg)

- Name:  ```Allow local logon ```
- Description:  ```Optional value ```
- OMA-URI:  ```./Device/Vendor/MSFT/Policy/Config/UserRights/AllowLocalLogOn ```
- Data type:  ```String ```
- Value: ```*S-1-5-32-544*S-1-5-32-545*S-1-5-32-546```

![220896356-21e94a20-c310-4634-9094-10dd02114905c7](https://user-images.githubusercontent.com/85555971/220933704-283f9173-c711-491c-8f0a-abe5aa0a36cc.jpg)

- Name: ```Deny local logon```
- Description:  ```Optional value ```
- OMA-URI: ```./Device/Vendor/MSFT/Policy/Config/UserRights/DenyLocalLogOn```
- Data type:  ```String ```
- Value: ```*S-1-5-32-546```

![220913500-f3e3d898-3781-4f7a-afddddddb-3221120406a0](https://user-images.githubusercontent.com/85555971/220935283-234e9bef-02e1-4108-95ff-afc821c9a491.jpg)

- Name: ```MDM Wins Over Policy```
- Description:  ```Optional value ```
- OMA-URI: ```./Device/Vendor/MSFT/Policy/Config/ControlPolicyConflict/MDMWinsOverGP```
- Data type: ```Integer```
- Value: ```1```

![220913500-f3e3d898-3781-4f7a-afddddddb-3221120406a0](https://user-images.githubusercontent.com/85555971/220936646-192225f0-981d-484d-8749-af12c0daf176.jpg)

- Name: ```Local Users And Groups```
- Description:  ```Optional value ```
- OMA-URI: ```./Device/Vendor/MSFT/Policy/Config/LocalUsersAndGroups/Configure```
- Data type: ```String(XML file)```
- Value: ```LocalLogonGroups.xml```

![Screeasdsadsssdadnshot](https://user-images.githubusercontent.com/85555971/220937889-4061d2f5-614e-4100-ab3a-e74dd803b741.png)

- Add groups where is that device and finally click <b>Create</b><br/>

![Screenshot13](https://user-images.githubusercontent.com/85555971/220907535-9f521307-f2ca-4f57-9cb1-f81ad02bfde6.jpg)
