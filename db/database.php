<?php
require_once(__DIR__ . "/tabelas/sessao.php");
class Database
{
    private static PDO $db;
    private static Sessao $sessao;

    private function __construct()
    {
    }

    private static function adquirir_db()
    {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO("sqlite:" . __DIR__ . "/database.db");
            } catch (PDOException $e) {
                $error = $e->getCode();
                var_dump($error);
                exit();
            }
        }

        return self::$db;
    }
    static function sessao()
    {
        $db = self::adquirir_db();
        if (!isset(self::$sessao)) {
            self::$sessao = new Sessao($db);
        }
        return self::$sessao;
    }
}

?>