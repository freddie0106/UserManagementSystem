<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>系统日志</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>系统日志</h1>
    <div class="card">
        <div class="card-body">
            <pre>{{ $logs }}</pre>
        </div>
    </div>
</div>
</body>
</html>
