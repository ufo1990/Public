
function ScheduledTaskRecurence {

    $path = "C:\ProgramData\"
    
    #Check if path exist
    if(!(Test-path -PathType container $path))
    {
        #Create new directory in path $path
        New-Item $path -Type Directory

        #Content file GetProcess.ps1
        $value = 'Get-Process | Out-File -FilePath .\Process.txt'
        
        #Create new file with script from $value
        New-Item -Path $path -Name "GetProcess.ps1" -ItemType File -Value $value

        #Adds an execute action to the GetProcess.ps1 file
        $action = New-ScheduledTaskAction -Execute "PowerShell.exe" -Argument "-ExecutionPolicy Bypass $($path)GetProcess.ps1" 

        #Trigger that will run after the user logs in
        $trigger =  New-ScheduledTaskTrigger -AtLogOn

        #Set Scheuduled run by system ang highest privilages
        $principal = New-ScheduledTaskPrincipal -UserID "NT AUTHORITY\SYSTEM" -LogonType ServiceAccount -RunLevel Highest

        #Registration of the task on the scheduled
        Register-ScheduledTask -Action $action -Trigger $trigger -TaskName "Name task" -Description "DescriptionIntune task" -Principal $principal
    }
}

ScheduledTaskRecurence
