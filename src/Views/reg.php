<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sing Up</title>
</head>
<body>
<h1>Sign Up Form</h1>
<?php
if ($_GET['errors'] == 2) {
    echo '<div>';
    echo 'Пользователь с такими данными уже есть в системе';
    echo '</div>';
}
?>

<div id="wrapper">
    <form id="signUp" method="post" action="/registration" enctype="multipart/form-data" autocomplete="off">
        <input type="text" id="name" name="login" placeholder="username" required/>
        <input type="text" id="age" name="age" placeholder="age" required/>
        <input type="text" id="description" name="description" placeholder="description" required/>
        <input type="password" id="pass" name="password" placeholder="password" required/>
        <input type="file" id="file" name="image" required/>
        <button type="submit">&#xf0da;</button>
    </form>
</div>
</body>
</html>
<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css');

    *{
        font-family: 'Open Sans', 'sans-serif', 'FontAwesome';
    }
    body{
        background: rgb(52, 56, 61);
        padding: 80px;
    }
    h1{
        color: rgb(255, 255, 255);
        margin: 20px auto 0;
        width: 200px;
        text-align: center;
    }
    #wrapper{
        position: absolute;
        width: 320px;
        left: 50%;
        margin-left: -160px;
        top: 50%;
        margin-top: -75px;
    }

    /* === Sign in Form === */
    #signUp {
        height: 90px;
        width: 300px;
        border-radius: 8px;
        position: relative;
    }
    #signUp::before {
        display: block;
        position: relative;
        height: 2px;
        background: rgb(52, 56, 61);
        content: '';
        top: 44px;
        margin-left: 20px;
        z-index: 1;
    }

    #signUp input:first-of-type{
        border-top-right-radius: 8px;
        border-top-left-radius: 8px;
    }
    #signUp input:last-of-type{
        border-bottom-right-radius: 8px;
        border-bottom-left-radius: 8px;
    }
    #signUp  input[type="text"], #signUp input[type="password"], #signUp button[type="submit"], #signUp input[type="file"]{
        background: rgb(28, 30, 33);
        box-shadow: inset -100px -100px 0 rgb(28, 30, 33); /*Prevent yellow autofill color*/
        color: rgb(52, 56, 61);
    }
    #signUp input[type="file"] {
        width: 280px;
    }
    #signUp  input[type="text"], #signUp  input[type="password"]{
        position: relative;
        display: block;
        width: 280px;
        height: 45px;
        border: 0;
        outline: 0;
        top: -2px;
        padding: 0 0 0 20px;
        font-weight: 700;
    }
    #signUp  input[type="text"]:focus, #signUp  input[type="password"]:focus{
        color: rgb(255, 255, 255);
    }
    #signUp button[type="submit"]{
        display: block;
        position: absolute;
        width: 52px;
        height: 52px;
        color: rgb(52, 56, 61);
        border-radius: 50px;
        outline: 0;
        z-index: 2;
        top: 19px;
        right: -24px;
        border: 6px solid rgb(52, 56, 61);
        font-size: 25px;
        text-indent: 0px;
        padding-left: 9px;
        padding-bottom: 3px;
        text-align: center;
    }
    #signUp button[type="submit"]:hover{
        color: rgb(0, 126, 165);
        text-shadow: 0 0 10px rgb(0, 126, 165);
        cursor: pointer;
    }
    #signUp p {
        color: rgb(79, 85, 97);
        padding: 0 20px;
        font-weight: 700;
        font-size: 12px;
        margin: 5px 0 0 0;
        margin-bottom: 20px;
    }
    #signUp p > a, #signUp > a{
        color: rgb(111, 119, 135);
        text-decoration: none;
    }
    #signUp p > a:hover, #signUp > a:hover{
        border-bottom: 1px solid;
    }

    #signUp > a {
        font-size: 12px;
        margin-left: 20px;
    }
</style>