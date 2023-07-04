<?php
if (!isset($_POST["email"]) || !isset($_POST["password"]))
    return;

$email = $_POST["email"];
$senha = $_POST["password"];

echo "Email: " . $email . "Senha:" . $senha;
?>