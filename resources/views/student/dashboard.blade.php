<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>学生信息</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background-color: #e9f0fd !important;
        }
        .my-info {
            font-size: 18px;
        }
        .info-container {
            margin-top: 50px;
            padding-bottom: 20px;
        }
        .buttons-container {
            margin-top: -10px;
        }
        .logout-btn {
            background-color: #e9f0fd;
        }
        .btn-group .btn {
            padding: 6px 12px;
        }
        .btn-group .btn + .btn {
            margin-left: 10px;
        }
        .my-info td:first-child {
            width: 100px;
        }
        .table.my-info {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">学生仪表板</a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link logout-btn">登出</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="info-container">
                <h1 class="text-center mb-4">我的信息</h1>
                <table class="table my-info">
                    <tr>
                        <td><strong>姓名：</strong></td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td><strong>邮箱：</strong></td>
                        <td>{{ $user->email }}</td>
                    </tr>
                </table>
            </div>
            <div class="row justify-content-center buttons-container">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateInfoModal">更新信息</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 更新信息模态框 -->
<div class="modal fade" id="updateInfoModal" tabindex="-1" aria-labelledby="updateInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateInfoModalLabel">更新个人信息</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('student.update') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">姓名</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">邮箱</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary">保存更改</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
