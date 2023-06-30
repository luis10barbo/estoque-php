<?php

class Endereco extends Tabela
{
    public function nome_tabela(): string
    {
        return "endereco";
    }

    public function buscar(int $id_endereco)
    {
        return $this->__buscar(array("id_endereco" => $id_endereco));
    }

    public function inserir(int|null $cep_endereco = null, string|null $uf_endereco = null, string|null $cidade_endereco = null, string|null $bairro_endereco = null, string|null $rua_endereco = null, int|null $numero_endereco = null, string|null $complemento_endereco = null)
    {
        return $this->__inserir(array("cep_endereco" => $cep_endereco, "uf_endereco" => $uf_endereco, "cidade_endereco" => $cidade_endereco, "bairro_endereco" => $bairro_endereco, "rua_endereco" => $rua_endereco, "numero_endereco" => $numero_endereco, "complemento_endereco" => $complemento_endereco));
    }

    public function remover(int $id_endereco)
    {
        return $this->__remover(array("id_endereco" => $id_endereco));
    }

    public function atualizar(int $id_endereco, int|null $cep_endereco = null, string|null $uf_endereco = null, string|null $cidade_endereco = null, string|null $bairro_endereco = null, string|null $rua_endereco = null, int|null $numero_endereco = null, string|null $complemento_endereco = null)
    {
        return $this->__atualizar(array("id_endereco" => $id_endereco), array("cep_endereco" => $cep_endereco, "uf_endereco" => $uf_endereco, "cidade_endereco" => $cidade_endereco, "bairro_endereco" => $bairro_endereco, "rua_endereco" => $rua_endereco, "numero_endereco" => $numero_endereco, "complemento_endereco" => $complemento_endereco));
    }
}