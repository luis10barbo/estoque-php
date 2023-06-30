<?php
require_once(__DIR__ . "/tabela.php");
class Sessao extends Tabela
{
    public function nome_tabela(): string
    {
        return "sessao";
    }

    private function salvar_sessao(string $id_sessao)
    {
        return $this->__inserir(array("id_sessao" => $id_sessao));
    }

    private function select_sessao(string $id_sessao)
    {
        return $this->__buscar(array("id_sessao" => $id_sessao));
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