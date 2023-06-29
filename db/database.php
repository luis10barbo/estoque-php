<?php
require_once(__DIR__ . "/tabelas/sessao.php");
$diretorio_db = __DIR__ . "/database.db";

class Database
{
    private static PDO $db;
    private static Sessao $sessao;

    private function __construct()
    {
    }
    private static function setar_schema_db()
    {
        $query = file_get_contents(__DIR__ . "/creation.sql");
        self::$db->exec($query);
    }
    private static function adquirir_db()
    {
        global $diretorio_db;
        if (!isset(self::$db)) {
            $setar_schema = !file_exists($diretorio_db);

            try {
                self::$db = new PDO("sqlite:" . $diretorio_db);
            } catch (PDOException $e) {
                $error = $e->getCode();
                var_dump($error);
                exit();
            }

            if ($setar_schema)
                self::setar_schema_db();

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