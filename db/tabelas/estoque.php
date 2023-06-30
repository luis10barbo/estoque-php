<?php
class Estoque extends Tabela
{
    public function nome_tabela(): string
    {
        return "estoque";
    }
    public function buscar(int $id_estoque)
    {
        return $this->__buscar(array("id_estoque" => $id_estoque));
    }
    public function inserir(int|null $id_endereco = null, int|null $id_dono = null, string|null $nome_estoque = null)
    {
        return $this->__inserir(array("id_endereco" => $id_endereco, "id_dono" => $id_dono, "nome_estoque" => $nome_estoque));
    }
    public function remover(int $id_estoque)
    {
        return $this->__remover(array("id_estoque" => $id_estoque));
    }
    public function atualizar(int $id_estoque, int|null $id_endereco = null, int|null $id_dono = null, string|null $nome_estoque)
    {
        return $this->__atualizar(array("id_estoque" => $id_estoque), array("id_endereco" => $id_endereco, "id_dono" => $id_dono, "nome_estoque" => $nome_estoque));
    }
}