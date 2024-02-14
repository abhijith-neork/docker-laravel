<!DOCTYPE html>
<html lang=”en-US”>

<head>
    <meta charset=”utf-8”>
</head>

<body>
    <h2>Hi {{ $name }},</h2>
    <p>You are invited to join Neork.Please see the details below.</p>
    <p>User Name - <b>{{ $name }}</b></p>
    <p>Email ID - <b>{{ $email }}</b></p>
    @isset($password)
        <p>Password - <b>{{ $password }}</b></p>
    @endisset <p> Please use the above credentials to login the system using the below link.</p>
    <p> <a href="{{ asset('/') }}">Login</a></p>
    <p>Regards,</p>
    <p>Neork Team </p>
</body>

</html>
