# Table Generator @WDev

[![Maintainer](http://img.shields.io/badge/maintainer-@WesleyR99998115-blue.svg?style=flat-square)](https://twitter.com/@WesleyR99998115)
[![Source Code](http://img.shields.io/badge/source-tablegenerator-blue.svg?style=flat-square)](https://github.com/wesley-reis/TableGenerator)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/coffeecode/datalayer.svg?style=flat-square)](https://packagist.org/packages/TableGenerator)
[![Latest Version](https://img.shields.io/github/release/wesley-reis/TableGenerator.svg?style=flat-square)](https://github.com/wesley-reis/TableGenerator/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build](https://img.shields.io/scrutinizer/build/g/robsonvleite/datalayer.svg?style=flat-square)](https://scrutinizer-ci.com/g/robsonvleite/datalayer)
[![Quality Score](https://img.shields.io/scrutinizer/g/robsonvleite/datalayer.svg?style=flat-square)](https://scrutinizer-ci.com/g/robsonvleite/datalayer)
[![Total Downloads](https://img.shields.io/packagist/dt/coffeecode/datalayer.svg?style=flat-square)](https://packagist.org/packages/coffeecode/datalayer)

###### 
The table generator is a component for creating tables for your database that uses PDO to add, delete and edit tables using a flat file in php.

O table generator é um componente para criação de tabelas para seu banco de dados que usa PDO para incluir, deletar e editar tabelas usando m arquivo simples em php.

### Highlights

- Easy to set up (Fácil de configurar)
- Create tables fast and easy (Crie tabelas rápido e fácil)
- Composer ready (Pronto para o composer)

## Installation

Data Layer is available via Composer:

```bash
"codewdev/tablegenerator": "1.0.*"
```

or run

```bash
composer require codewdev/tablegenerator
```

## Documentation

###### For more details on how to use Table Generator, see the example folder with details in the component directory

Para mais detalhes sobre como usar o Table Generator, veja a pasta de exemplo com detalhes no diretório do componente

#### connection

###### To begin using the Table Generator, you need to connect to the database (MariaDB / MySql). For more connections [PDO connections manual on PHP.net](https://www.php.net/manual/pt_BR/pdo.drivers.php)

Para começar a usar o Table Generator precisamos de uma conexão com o seu banco de dados. Para ver as conexões possíveis acesse o [manual de conexões do PDO em PHP.net](https://www.php.net/manual/pt_BR/pdo.drivers.php)

```php
define("TABLE_GEN_CONF", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "nome_db",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);
```

#### your model

```php
<?php

use CodeWdev\TableGenerator\TableGenerator;

require __DIR__ . "/../vendor/autoload.php";


//creating table
$user_data = new TableGenerator("users", [
    "first_name" => "VARCHAR(10) NOT NULL",
    "last_name" => "VARCHAR(255) NOT NULL",
    "email" => "VARCHAR(255) UNIQUE NOT NULL",
    "password" => "VARCHAR(255) NOT NULL DEFAULT 0"
]);


//command to create the table
$user_data->create();


//adding columns to the table
$user_data->addColumn([
    "document" => "VARCHAR(10)",
    "company" => "VARCHAR(50) NOT NULL"
]);


//
//deleting a column
$user_data->dropColumn("company");


//deleting a table
$user_data->drop();
```


## Contributing

Please see [CONTRIBUTING](https://github.com/wesley-reis/datalayer/blob/master/CONTRIBUTING.md) for details.

## Support

###### If you discover any issues related to the component or would like to make a contribution, please feel free to get in touch.

Se você descobrir algum problema relacionado ao componente ou quiser dar uma contribuição, fique a vontade para entrar em contato.

Thank you

## Credits

- [Wesley R.Reis](https://github.com/wesley-reis) (Developer)
- [All Contributors](https://github.com/wesley-reis/TableGenerator/contributors) (This Rock)

## License

The MIT License (MIT). Please see [License File](https://github.com/wesley-reis/TableGenerator/blob/master/LICENSE) for more information.
