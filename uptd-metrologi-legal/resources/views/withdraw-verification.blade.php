<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Withdraw Verification</h3>
    <ul>
        <li>Verification Link : <a href="{{ route('withdraw.verification', ['token' => $url]) }}" target="_blank">Link</a></li>
    </ul>
</body>
</html>
