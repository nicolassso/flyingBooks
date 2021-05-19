<?php

session_start();

if (isset($_SESSION["id"])) {
    header("Location: /php-login");
}

require "database.php";

if(!empty($_POST["email"]) && !empty($_POST["password"])){
    $records = $conn->prepare("SELECT id_propietario, email_propietario, password_propietario FROM usuarios WHERE email_propietario=:email");
    $records->bindParam(":email", $_POST["email"]);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message ="";

    if (count($results)>0 && password_verify($_POST["password"], $results["password_propietario"])) {
        $_SESSION["id"] = $results["id_propietario"];
        header("location: /php-login");
    }else{
        $message = "Fallo de autenticación";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="assets\css\styles.css">

</head>
<body>
    <?php require "partials/header.php"?>

    
    <h1>Iniciar sesión</h1>

    <span>  <a href="signup.php">Registrarse</a></span>

    <?php if(!empty($message)): ?>
        <p><?= $message ?></p>
    <?php endif; ?>


    <form action="login.php" method="POST">
        <input type="text" name="email" placeholder="Introduzca e-mail">
        <input type="password" name="password" placeholder="Ingrese contraseña">
        <input type="submit" value="enviar">
    </form>
</body>
</html>