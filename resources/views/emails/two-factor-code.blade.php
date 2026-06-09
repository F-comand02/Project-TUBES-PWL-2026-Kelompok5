<!DOCTYPE html>
<html>
<head>
    <title>WaterRelief OTP</title>
</head>
<body>

    <h2>WaterRelief Verification Code</h2>

    <p>Hello {{ $user->name }},</p>

    <p>Your OTP Code:</p>

    <h1>{{ $user->two_factor_code }}</h1>

    <p>This code expires in 10 minutes.</p>

</body>
</html>