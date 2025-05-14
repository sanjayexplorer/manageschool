<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $subject }}</title>
</head>
<body>
    <p><strong>Sender's Email:</strong> {{ $senderEmail ?? 'N/A' }}</p>
    <p><strong>Message:</strong> {{ $msg }}</p>
</body>
</html>
