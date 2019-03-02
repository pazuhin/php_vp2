<?php
CONST CSS_URL = 'src/Views/css/loginCss.css';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo CSS_URL ?>">
    <title>Sing in</title>
</head>
<body>
<h1>Sign In Form</h1>
<?php if (!empty($error)) : ?>
    <div class="alert alert-danger" role="alert">
        Неверный логин или пароль
    </div>
<?php endif; ?>
<div id="wrapper">
    <form id="signin" method="post" action="/login" autocomplete="off">
        <input type="text" id="login" name="login" placeholder="username"/>
        <input type="password" id="password" name="password" placeholder="password"/>
        <button type="submit">&#xf0da;</button>
        <p>forgot your password? <a href="#">click here</a></p>
        <a class="link" href="src/Views/reg.php">go to the registration form</a>
    </form>
</div>
</body>
</html>

