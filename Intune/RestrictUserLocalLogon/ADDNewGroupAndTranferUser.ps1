#User Enrolled Azure AD user
$UserEnrolledAzureAD =  net localgroup $group | ? {$_ -match "AzureAD"}

if ($UserEnrolledAzureAD -ne $null) {

    #Add new local group
    New-LocalGroup -Name 'Intune' -Description 'Intune members with enrolled devices'

    #Delete User from group administrators
    net localgroup $group  $UserEnrolledAzureAD  /delete

    #Add new member into group Intune
    Add-LocalGroupMember -Group "Intune" -Member $UserEnrolledAzureAD

}



