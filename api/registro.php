<?php

require_once(__DIR__."/../utils/error.php");
require_once(__DIR__."/../db/database.php");
require_once(__DIR__."/../utils/sessao.php");


if (!isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["password_confirm"]))
    return;

$email = $_POST["email"];
$senha = $_POST["password"];
$senha_confirmar = $_POST["password_confirm"];

// checar se existe email registrado ok
// se nao tiver registrado usuario com este email, dar hash na senha, guardar o email e o hash da senha no db
// atualizar a sessao trocando o id do usuario para o registrado na etapa anterior

if($senha != $senha_confirmar){
    echo criar_erro("As senhas nao sao iguais"); 
    return;
}

$resultado = Database::usuario()->buscar_email($email);
if($resultado){
    echo criar_erro("Ja existe um usuario com este email"); 
    return;
}
    
$hash_senha = password_hash($senha, PASSWORD_DEFAULT);
    echo $hash_senha;

Database::usuario()->inserir($email, $hash_senha);

$resultado = Database::usuario()->buscar_email($email);
if(!$resultado)
    return;

$sessao = adquirir_sessao();
Database::sessao()->atualizar($sessao["id_sessao"], $resultado["id_usuario"]);

echo json_encode($resultado);
?>