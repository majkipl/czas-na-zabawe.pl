<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        u + .body {
            line-height: 100% !important;
        }
    </style>
</head>
<body>
<p>Imię i nazwisko: {{ $details['name'] }}</p>
<p>Email: {{ $details['email'] }}</p>
<p>{{ $details['contact_message'] }}</p>
</body>
</html>
