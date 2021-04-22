<?php
    if(isset($_POST['ok'])){
        $user = strip_tags($_POST['user']);
        $pass = strip_tags($_POST['pass']);
        if($user == 'admin' && $pass == 123) {
            header('location:rv.php');
        }
        else
            header('location:admin.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des contacts et rendez-vous</title>
    <style>
        body{
            height: 100vh;
            display: flex;
            justify-content: center;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            align-content: center;
            overflow: hidden;
            background-image: url("../images/company.jpg");
            background-size: cover;
        }
        body::after{
            content: "";
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.582);
            z-index: -1;
        }
        h1{
            color: aliceblue;
        }
        form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            align-content: center;
            padding: 10px;
            background: rgba(17, 34, 68, 0.493);
        }
        form input{
            padding: 10px;
            margin: 10px;
            border: 1px solid transparent;
        }
        form input:focus{
            outline: none;
        }
        form input[type="submit"]{
            background: rgba(17, 34, 68, 0.952);
            border: 1px solid transparent;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Identifiez-vous</h1>
    <form action="#" method="post">
        <input type="text" name="user" placeholder="Nom d'utilisateur">
        <input type="password" name="pass" placeholder="Mot de passe">
        <input type="submit" value="se connecter" name="ok">
    </form>
</body>
</html>