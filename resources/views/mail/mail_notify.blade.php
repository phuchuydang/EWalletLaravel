@extends('layouts.mail')
@section('mail_content')
<center style="background-color:#E1E1E1;">
    <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTbl" style="table-layout: fixed;max-width:100% !important;width: 100% !important;min-width: 100% !important;">
        <tr>
            <td align="center" valign="top" id="bodyCell">
            <table bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" width="500" id="emailBody">
                <tr>
                    <td align="center" valign="top">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="color:#FFFFFF;" bgcolor="#2E7D32">
                        <tr>
                            <td align="center" valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                                    <tr>
                                    <td align="center" valign="top" width="500" class="flexibleContainerCell">
                                        <table border="0" cellpadding="30" cellspacing="0" width="100%">
                                            <tr>
                                                <td align="center" valign="top" class="textContent">
                                                <h1 style="color:#FFFFFF;line-height:100%;font-family:Helvetica,Arial,sans-serif;font-size:35px;font-weight:normal;margin-bottom:5px;text-align:center;">Wellcome to Our Website</h1>
                                                <h2 style="text-align:center;font-weight:normal;font-family:Helvetica,Arial,sans-serif;font-size:23px;margin-bottom:10px;color:#C9BC20;line-height:135%;">Register Succesfully</h2>
                                                {{-- 
                                                <div style="text-align:center;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#FFFFFF;line-height:135%;">You have been assigned a {{taskType}} </div>
                                                --}}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td align="center" valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                                    <tr>
                                    <td align="center" valign="top" width="500" class="flexibleContainerCell">
                                        <table border="0" cellpadding="30" cellspacing="0" width="100%">
                                            <tr>
                                                <td align="center" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td valign="top" class="textContent">
                                                        <h3 style="color:#5F5F5F;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;">This is your information</h3>
                                                        <div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;margin-top:3px;color:#5F5F5F;line-height:135%;"> Username: {{ $data['username'] }}</div>
                                                        <div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;margin-top:3px;color:#5F5F5F;line-height:135%;"> Password: {{ $data['password'] }}</div>
                                                        <small style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;margin-top:3px;color:#5F5F5F;line-height:135%;">*Please change your password after login</small>
                                                        </td>
                                                    </tr>
                                                </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#F8F8F8">
                        <tr>
                            <td align="center" valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                                    <tr>
                                    <td align="center" valign="top" width="500" class="flexibleContainerCell">
                                        <table border="0" cellpadding="30" cellspacing="0" width="100%">
                                            <tr>
                                                <td align="center" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0" width="50%" class="emailButton" style="background-color: #2E7D32;">
                                                    <tr>
                                                        <td align="center" valign="middle" class="buttonContent" style="padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;">
                                                            <a style="color:#FFFFFF;text-decoration:none;font-family:Helvetica,Arial,sans-serif;font-size:20px;line-height:135%;" href="{{route('auth.login.get')}}" target="_blank">Log in here</a>
                                                        </td>
                                                    </tr>
                                                </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!-- footer -->
            <table bgcolor="#E1E1E1" border="0" cellpadding="0" cellspacing="0" width="500" id="emailFooter">
                <tr>
                    <td align="center" valign="top">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td align="center" valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                                    <tr>
                                    <td align="center" valign="top" width="500" class="flexibleContainerCell">
                                        <table border="0" cellpadding="30" cellspacing="0" width="100%">
                                            <tr>
                                                <td valign="top" bgcolor="#E1E1E1">
                                                <div style="font-family:Helvetica,Arial,sans-serif;font-size:13px;color:#828282;text-align:center;line-height:120%;">
                                                    <div>Copyright &#169; 2023. Created by Huy.DP</div>
                                                    <div></div>
                                                </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!-- // end of footer -->
            </td>
        </tr>
    </table>
</center>
@endsection