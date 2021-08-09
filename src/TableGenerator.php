<?php

namespace CodeWdev\TableGenerator;


/**
 *
 */
class TableGenerator
{
    /**
     * @var string
     */
    private $table;
    /**
     * @var array
     */
    private $columns;

    /**
     * @var string
     */
    private $params;

    /**
     * @var string
     */
    private $keys;

    /**
     * @var string
     */
    private $value;

    /**
     * @var string
     */
    private $id;


    private $fail;


    /**
     * @param string $table
     * @param array $columns
     */
    public function __construct(string $table, array $columns, string $id = "id")
    {
        $this->table = $table;
        $this->id = $id;
        $this->columns = $columns;
        $this->params = $this->createParams();
    }


    /**
     *
     */
    public function create():void
    {
       Connect::getInstance()->query("CREATE TABLE IF NOT EXISTS {$this->table} (
                {$this->id} INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                {$this->params},
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
                updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )  ENGINE=INNODB, COLLATE='UTF8_GENERAL_CI';");

       return;
    }

    /**
     *
     */
    public function drop():void
    {
        Connect::getInstance()->query("DROP TABLE IF EXISTS {$this->table}");
        return;
    }

    /**
     * @param array $columns
     */
    public function addColumn(array $columns):void
    {
        $this->columns = $columns;
        $this->params = $this->createParams();
        Connect::getInstance()->query("ALTER TABLE {$this->table} ADD COLUMN ({$this->params})");
        return;
    }

    /**
     * @param string $column
     */
    public function dropColumn(string $column):void
    {
        $this->params = $this->createParams();
        Connect::getInstance()->query("ALTER TABLE {$this->table} DROP COLUMN {$column}");
        return;
    }


    /**
     * @return string
     */
    private function createParams(): string
    {
       $this->keys = implode(", ", array_keys($this->columns));
       $this->value = implode(", ", array_values($this->columns));
       $key = explode(",", $this->keys );
       $value = explode(",", $this->value);

       $paramns = [];
       for ($i=0; $i<count($key); $i++){
           $list = "{$key[$i]} {$value[$i]}";
           $paramns[] = $list;
       }

     return implode(", ", array_values($paramns));
    }

}