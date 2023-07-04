<?php
if (!isset($_POST["email"]) || !isset($_POST["password"]))
    return;

$email = $_POST["email"];
$senha = $_POST["password"];
$senha_confirmar = $_POST["password_confirm"];


echo "Email: " . $email . " Senha:" . $senha . " Confirmar Senha:" . $senha_confirmar;
?>