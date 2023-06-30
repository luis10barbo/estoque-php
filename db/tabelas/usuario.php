<?php
require_once(__DIR__ . "/tabela.php");
class Usuario extends Tabela
{
    public function nome_tabela(): string
    {
        return "usuario";
    }
    public function inserir(string $apelido_usuario, string $email_usuario, string $senha_usuario)
    {
        return $this->__inserir(array("apelido_usuario" => $apelido_usuario, "email_usuario" => $email_usuario, "senha_usuario" => $senha_usuario));
    }
    public function buscar(int $id_usuario)
    {
        return $this->__buscar(array("id_usuario" => $id_usuario));
    }
    public function buscar_email(string $email_usuario)
    {
        return $this->__buscar(array("email_usuario" => $email_usuario));
    }
    public function buscar_apelido(string $apelido_usuario)
    {
        return $this->__buscar(array("apelido_usuario" => $apelido_usuario));
    }
    private function remover(int $id_usuario)
    {
        $this->__remover(array("id_usuario" => $id_usuario));
    }
    public function atualizar(int $id_usuario, string|null $apelido_usuario = null, string|null $email_usuario = null, string|null $senha_usuario = null)
    {
        $this->__atualizar(array("id_usuario" => $id_usuario), array("apelido_usuario" => $apelido_usuario, "email_usuario" => $email_usuario, "senha_usuario" => $senha_usuario));
    }
}
?>