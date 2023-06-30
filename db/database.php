<?php
require_once(__DIR__ . "/tabelas/sessao.php");
require_once(__DIR__ . "/tabelas/usuario.php");
require_once(__DIR__ . "/tabelas/endereco.php");
require_once(__DIR__ . "/tabelas/estoque.php");

$diretorio_db = __DIR__ . "/database.db";

class Database
{
    private static PDO $db;
    private static Sessao $sessao;
    private static Usuario $usuario;
    private static Endereco $endereco;
    private static Estoque $estoque;

    private function __construct()
    {
    }
    private static function setar_schema_db()
    {
        $query = file_get_contents(__DIR__ . "/schema.sql");
        self::$db->exec($query);

        file_put_contents(__DIR__ . "/current.sql", $query);
    }

    private static function checar_schema_atualizada()
    {
        $new = file_get_contents(__DIR__ . "/schema.sql");
        $current = file_get_contents(__DIR__ . "/current.sql");
        return $new === $current;
    }
    private static function adquirir_db()
    {
        global $diretorio_db;

        if (!isset(self::$db)) {
            // TODO: Remover sobescrever se schema desatualizada em PROD 
            if (!self::checar_schema_atualizada()) {
                unlink($diretorio_db);
            }

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
    public static function sessao()
    {
        if (!isset(self::$sessao)) {
            $db = self::adquirir_db();
            self::$sessao = new Sessao($db);
        }
        return self::$sessao;
    }
    public static function usuario()
    {
        if (!isset(self::$usuario)) {
            $db = self::adquirir_db();
            self::$usuario = new Usuario($db);
        }
        return self::$usuario;
    }

    public static function endereco()
    {
        if (!isset(self::$endereco)) {
            $db = self::adquirir_db();
            self::$endereco = new Endereco($db);
        }
        return self::$endereco;
    }
    public static function estoque()
    {
        if (!isset(self::$estoque)) {
            $db = self::adquirir_db();
            self::$estoque = new Estoque($db);
        }
        return self::$estoque;
    }
}

?>