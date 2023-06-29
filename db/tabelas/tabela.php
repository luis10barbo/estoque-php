<?php
abstract class Tabela
{
    public static PDO $db;

    abstract public string $nome_tabela;

    public function __construct(PDO $db)
    {
        self::$db = $db;
    }

    private function gerar_arg_igual_sql($argumentos)
    {
        $formatacao_sql = array();
        foreach ($argumentos as $nome_argumento => $valor_argumento) {
            if (!$valor_argumento)
                continue;

            array_push($formatacao_sql, $nome_argumento . " = :" . $nome_argumento);
        }

        return $formatacao_sql;
    }
    public function buscar_inseguro(array $argumentos_where)
    {
        $where = $this->gerar_arg_igual_sql($argumentos_where);
        if (empty($where))
            return false;

        $string_where = " WHERE " . join(" AND ", $where);
        $string_sql = "SELECT * FROM " . $this->nome_tabela . " " . $string_where;

        $comando = self::$db->prepare($string_sql);
        return $comando->execute($argumentos_where);
    }
    public function atualizar_inseguro(array $argumentos_where, array $argumentos_set)
    {
        $set = $this->gerar_arg_igual_sql($argumentos_set);
        $where = $this->gerar_arg_igual_sql($argumentos_where);

        // var_dump($set);
        // echo "<br/>";
        // var_dump($where);

        if (empty($set) || empty($where))
            return false;

        $string_set = join(", ", $set);
        $string_where = " WHERE " . join(" AND ", $where);
        $string_sql = "UPDATE " . $this->nome_tabela . " SET " . $string_set . $string_where;

        $comando = self::$db->prepare($string_sql);
        return $comando->execute($argumentos_set);
    }
}
?>