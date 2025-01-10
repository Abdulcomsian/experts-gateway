<!DOCTYPE html>
<html>
<head>
    <title>Password Reset Request</title>
</head>
<body>
    <p>Hello,</p>
    <p>You requested a password reset. Please click the link below to reset your password:</p>
    <p><a href="{{ url('/password/reset/' . $token) }}">Reset Password</a></p>
    <p>If you did not request a password reset, no further action is required.</p>
</body>
</html>
