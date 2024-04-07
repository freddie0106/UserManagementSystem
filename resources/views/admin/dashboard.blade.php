<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理员仪表板</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            background-color: #f2f2f2;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #dcdcdc;
            color: #343a40;
            margin-bottom: 20px;
        }

        .content {
            display: flex;
            justify-content: space-around;
            padding-top: 20px;
        }

        .button {
            background-color: #c0c0c0;
            border: none;
            color: #343a40;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 20px 10px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #b0b0b0;
        }

        .title {
            margin: 0 auto;
            font-family: '黑体', sans-serif;
        }

        .logout {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
<div class="header">
    <h1 class="title">管理员仪表板</h1>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="button logout" type="submit">登出</button>
    </form>
</div>

<div class="content">
    <button onclick="window.location.href='{{ route('admin.students') }}'" class="button">学生信息</button>
    <button onclick="window.location.href='{{ route('logs.index') }}'" class="button">系统日志</button>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
