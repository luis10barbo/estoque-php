<?php
abstract class Tabela
{
    public static PDO $db;
    public function __construct(PDO $db)
    {
        self::$db = $db;
    }
}
?>