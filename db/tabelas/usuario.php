<?php
require_once(__DIR__ . "/tabela.php");
class Usuario extends Tabela
{
    private function inserir(string $apelido_usuario, string $email_usuario, string $senha_usuario)
    {
        $comando = self::$db->prepare("INSERT INTO usuario (apelido_usuario, email_usuario, senha_usuario) VALUES (:apelido_usuario, :email_usuario, :senha_usuario)");
        return $comando->execute();
    }
    public function buscar(int $id_usuario)
    {
        $comando = self::$db->prepare("SELECT id_usuario, apelido_usuario, email_usuario FROM usuario WHERE id_usuario = :id_usuario");
        $comando->execute(array("id_usuario" => $id_usuario));

        return $comando->fetch();
    }
    private function remover(int $id_usuario)
    {
        $comando = self::$db->prepare("DELETE FROM usuario WHERE id_usuario = :id_usuario");
    }
    public function atualizar(int $id_usuario, string|null $apelido_usuario = null, string|null $email_usuario = null, string|null $senha_usuario = null)
    {
        $this->atualizar_inseguro(array("id_usuario" => $id_usuario), array("apelido_usuario" => $apelido_usuario, "email_usuario" => $email_usuario, "senha_usuario" => $senha_usuario));
        // $set = array();
        // $argumentos_set = array("id_usuario" => $id_usuario);

        // if ($apelido_usuario) {
        //     array_push($set, "apelido_usuario = :apelido_usuario");
        //     $argumentos_set["apelido_usuario"] = $apelido_usuario;
        // }
        // if ($email_usuario) {
        //     array_push($set, "email_usuario = :email_usuario");
        //     $argumentos_set["email_usuario"] = $email_usuario;
        // }
        // if ($senha_usuario) {
        //     array_push($set, "senha_usuario = :senha_usuario");
        //     $argumentos_set["senha_usuario"] = $senha_usuario;

        // }
        // if (count($set) === 0)
        //     return false;

        // $string_set = join(", ", $set);
        // $comando = self::$db->prepare("UPDATE usuario SET " . $string_set . " WHERE id_usuario = :id_usuario");
        // return $comando->execute($argumentos_set);
    }
}
?>