<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Admin</title>
</head>
<body>
<?php
if (!empty($error)) : ?>
    <div class="alert alert-danger" role="alert">
        Неверный логин или пароль
    </div>
<?php endif; ?>
<div class="container">
    <a href="/admin">Профиль</a> /
    <a href="/admin/load">Загрузить изображение</a> /
    <a href="/admin/images">Список загруженных фото</a> /
    <a href="/admin/show">Все пользователи</a> /
    <a href="/logout">Выход</a>
</div>
<form id="create" method="post" action="/admin/create" enctype="multipart/form-data" autocomplete="off">
    <input type="text" id="name" name="login" placeholder="username" required/>
    <input type="text" id="age" name="age" placeholder="age" required/>
    <input type="text" id="description" name="description" placeholder="description" required/>
    <input type="password" id="pass" name="password" placeholder="password" required/>
    <input type="file" id="file" name="image" required/>
    <button type="submit" name="save">Сохранить</button>
</form>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
<style>
    form {
        display: flex;
       flex-direction: column;
        margin-left: 500px;
        margin-top: 50px;
    }
    input, button {
        width: 200px;
        margin-bottom: 10px;
    }
</style>