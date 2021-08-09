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




