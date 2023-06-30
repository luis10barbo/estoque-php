<?php
class Produto extends Tabela
{
    public function nome_tabela(): string
    {
        return "produto";
    }
    public function buscar(int $id_produto)
    {
        return $this->__buscar(array("id_produto" => $id_produto));
    }
    public function inserir(string|null $nome_produto = null, string|null $fornecedor_produto = null, float|null $preco_encomenda = null)
    {
        return $this->__inserir(array("nome_produto" => $nome_produto, "fornecedor_produto" => $fornecedor_produto, "preco_encomenda" => $preco_encomenda));
    }
    public function remover(int $id_produto)
    {
        return $this->__remover(array("id_produto" => $id_produto));
    }
    public function atualizar(int $id_produto, string|null $nome_produto = null, string|null $fornecedor_produto = null, float|null $preco_encomenda = null)
    {
        return $this->__atualizar(array("id_produto" => $id_produto), array("nome_produto" => $nome_produto, "fornecedor_produto" => $fornecedor_produto, "preco_encomenda" => $preco_encomenda));
    }
}