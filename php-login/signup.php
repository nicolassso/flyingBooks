<?php require "database.php";

$message="";

    if(!empty($_POST["email"]) && !empty($_POST["password"])){
        $sql = "insert into usuarios (email_propietario, password_propietario) VALUES (:email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":email", $_POST["email"]);
        $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
        $stmt->bindParam(":password", $password);
        

        if($stmt->execute()){
            $message = "Usuario creado";
                    
        }else{
            $message = "Error creando el usuario";

        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="assets\css\styles.css">

</head>
<body>
    <?php require "partials/header.php"?>

    <?php if(!empty($message)): ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <h1>Registrarse</h1>
    <span> o <a href="login.php">Iniciar sesión</a></span>
    <form action="signup.php" method="POST">
        <input type="text" name="email" placeholder="Introduzca e-mail">
        <input type="password" name="password" placeholder="Ingrese contraseña">
        <input type="submit" value="enviar">
    </form>
</body>
</html>