<html>
    <head>
        <title>Forgot Password Email</title>
    </head>
    <body>
        <table>
            <tr><td>Dear {{ $name }}!</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Your account has been successfully updated.</td>Your account information is as below with new Password:</tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Email: {{ $email }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>New Password: {{ $password }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>thanks & Regards,</td></tr>
            <tr><td>Code95 School</td></tr>
        </table>
    </body>
</html>