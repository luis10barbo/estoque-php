<?php
if (!isset($_POST["email"]) || !isset($_POST["password"]))
    return;

$email = $_POST["email"];
$senha = $_POST["password"];

// Buscar o usuario pelo email
// checar se a senha enviada corresponde ao hash guardado no usuario
// caso sim, atualizar id_usuario na sessao

echo "Email: " . $email . "Senha:" . $senha;
?>