<?php
CONST CSS_URL_REG = 'src/Views/css/regCss.css';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo CSS_URL_REG ?>">
    <title>Sing Up</title>
</head>
<body>
<h1>Sign Up Form</h1>
<div id="wrapper">
    <form id="signUp" method="post" action="/reg" autocomplete="off">
        <input type="text" id="login" name="login" placeholder="username"/>
        <input type="text" id="age" name="age" placeholder="age"/>
        <input type="text" id="description" name="description" placeholder="description"/>
        <input type="password" id="password" name="password" placeholder="password"/>
        <button type="submit">&#xf0da;</button>
    </form>
</div>
</body>
</html>
