<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>标题系统仪表盘</title>
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

        .title {
            font-size: 24px;
            margin: 0 auto;
        }

        .button {
            background-color: #dc3545;
            border: none;
            color: white;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-right: 10px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button.logout {
            margin-right: 0;
        }

        .content {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .section {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            border-radius: 5px;
            width: 45%;
            margin: 10px;
        }

        .section h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 15px;
        }

        .section .view-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .section .view-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="header">
    <h1 class="title">管理员仪表盘</h1>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="button logout" type="submit">登出</button>
    </form>
</div>

<div class="content">
    <div class="section">
        <h2>学生信息</h2>
        <button onclick="window.location.href='{{ route('admin.students') }}'" class="button view-button">查看</button>
    </div>
    <div class="section">
        <h2>系统日志</h2>
        <button onclick="window.location.href='{{ route('logs.index') }}'" class="button view-button">查看</button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
