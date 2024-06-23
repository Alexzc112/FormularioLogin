<?php
$user = "";
$pass = "";
$edad = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = !empty($_POST['user']) ? trim($_POST['user']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
    $edad = !empty($_POST['edad']) ? trim($_POST['edad']) : null;
    $error_message = null;

    if (is_null($user) || is_null($pass) || is_null($edad)) {
        $error_message = "Todos los campos son requeridos, por favor intenta de nuevo.";
    } else {
        if ($user !== "luis" || $pass !== "mendoza") {
            $error_message = "Usuario o contraseña incorrectos.";
        }
        if (!is_numeric($edad) || $edad < 18) {
            $error_message = "Edad incorrecta. Debes ser mayor de 18 años.";
        }
    }

    if (is_null($error_message)) {
        echo "Bienvenido, " . htmlspecialchars($user) . "!";
    } else {
        echo htmlspecialchars($error_message);
    }
}
?>
