<?php
require_once(__DIR__ . "/tabela.php");
class Usuario extends Tabela
{
    public string $nome_tabela = "usuario";
    private function inserir(string $apelido_usuario, string $email_usuario, string $senha_usuario)
    {
        $comando = self::$db->prepare("INSERT INTO " . $this->nome_tabela . " (apelido_usuario, email_usuario, senha_usuario) VALUES (:apelido_usuario, :email_usuario, :senha_usuario)");
        return $comando->execute();
    }
    public function buscar(int $id_usuario)
    {
        $comando = self::$db->prepare("SELECT id_usuario, apelido_usuario, email_usuario FROM " . $this->nome_tabela . " WHERE id_usuario = :id_usuario");
        $comando->execute(array("id_usuario" => $id_usuario));

        return $comando->fetch();
    }
    private function remover(int $id_usuario)
    {
        $comando = self::$db->prepare("DELETE FROM " . $this->nome_tabela . " WHERE id_usuario = :id_usuario");
    }
    public function atualizar(int $id_usuario, string|null $apelido_usuario = null, string|null $email_usuario = null, string|null $senha_usuario = null)
    {
        $this->atualizar_inseguro(array("id_usuario" => $id_usuario), array("apelido_usuario" => $apelido_usuario, "email_usuario" => $email_usuario, "senha_usuario" => $senha_usuario));
    }
}
?>