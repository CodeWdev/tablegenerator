<?php

namespace CodeWdev\TableGenerator;

use PDO;
use PDOException;


/**
 *
 */
class Connect
{
    /** @var PDO */
    private static $instance;

    /** @var PDOException */
    private static $error;

    /**
     * @return PDO
     */
    public static function getInstance(): ?PDO
    {
        if (empty(self::$instance)) {
            try {
                self::$instance = new PDO(
                    TABLE_GEN_CONF["driver"] . ":host=" . TABLE_GEN_CONF["host"] . ";dbname=" . TABLE_GEN_CONF["dbname"] . ";port=" . TABLE_GEN_CONF["port"],
                    TABLE_GEN_CONF["username"],
                    TABLE_GEN_CONF["passwd"],
                    TABLE_GEN_CONF["options"]
                );
            } catch (PDOException $exception) {
                self::$error = $exception;
            }
        }
        return self::$instance;
    }


    /**
     * @return PDOException|null
     */
    public static function getError(): ?PDOException
    {
        return self::$error;
    }

    /**
     * Connect constructor.
     */
    private function __construct()
    {
    }

    /**
     * Connect clone.
     */
    private function __clone()
    {
    }
}
