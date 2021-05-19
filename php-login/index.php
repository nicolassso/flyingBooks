<?php
session_start();
require "database.php";

if (isset($_SESSION["id"])) {
    $records = $conn->prepare("SELECT id_propietario, email_propietario, password_propietario FROM usuarios WHERE id_propietario = :id");
    $records -> bindParam(":id", $_SESSION["id"]);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results)>0) {
        $user = $results;
    }
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="assets\css\styles.css">
</head>
<body>
    <?php require "partials/header.php"?>

    <?php if (!empty($user)): ?>

    <h1>Bienvenido</h1> <?=$user["email_propietario"]?>
    <a href="logout.php">Cerrar sesión</a>
    <?php else: ?>
    <a href="login.php">Inicciar sesión</a> o
    <a href="signup.php">Registrarse</a>
    <?php endif; ?>

</body>
</html>