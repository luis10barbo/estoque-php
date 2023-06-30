<?php
require_once(__DIR__ . "/tabela.php");
class Sessao extends Tabela
{
    public function nome_tabela()
    {
        return "sessao";
    }

    private function salvar_sessao(string $id_sessao)
    {
        $comando = self::$db->prepare("INSERT INTO sessao (id_sessao) VALUES (:id_sessao)");
        return $comando->execute(array("id_sessao" => $id_sessao));
    }

    private function select_sessao(string $id_sessao)
    {
        $comando = self::$db->prepare("SELECT * FROM sessao WHERE id_sessao = :id_sessao");
        $comando->execute(array("id_sessao" => $id_sessao));

        return $comando->fetch(PDO::FETCH_ASSOC);
    }
    public function adquirir_sessao(string $id_sessao)
    {
        $sessao = $this->select_sessao($id_sessao);
        if (empty($sessao)) {
            self::salvar_sessao($id_sessao);
            return self::select_sessao($id_sessao);
        }

        return $sessao;
    }
}
?>