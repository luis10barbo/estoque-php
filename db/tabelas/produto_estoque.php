<?php
class ProdutoEstoque extends Tabela
{
    public function nome_tabela(): string
    {
        return "produto_estoque";
    }
    public function buscar(int $id_produto_estoque)
    {
        return $this->__buscar(array("id_produto_estoque" => $id_produto_estoque));
    }
    public function inserir(string|null $codigo_produto, int $id_estoque, int $id_produto, int|null $estoque_produto, int|null $vendas_produto, float $preco_produto)
    {
        return $this->__inserir(array("codigo_produto" => $codigo_produto, "id_estoque" => $id_estoque, "id_produto" => $id_produto, "estoque_produto" => $estoque_produto, "vendas_produto" => $vendas_produto, "preco_produto" => $preco_produto));
    }
    public function remover(int $id_produto_estoque)
    {
        return $this->__remover(array("id_produto_estoque" => $id_produto_estoque));
    }
    public function atualizar(int $id_produto_estoque, string|null $codigo_produto, int $id_estoque, int $id_produto, int|null $estoque_produto, int|null $vendas_produto, float $preco_produto)
    {
        return $this->__atualizar(array("id_produto_estoque" => $id_produto_estoque), array("codigo_produto" => $codigo_produto, "id_estoque" => $id_estoque, "id_produto" => $id_produto, "estoque_produto" => $estoque_produto, "vendas_produto" => $vendas_produto, "preco_produto" => $preco_produto));
    }
}