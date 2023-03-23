<?php
require_once("config/constants.php");
$host = HOST;
$db = DB;
$user = USER;
$password = PASSWORD;
$charset = CHARSET;

function connect()
    {
        try {
            $connection = "mysql:host=" . HOST . ";"
                . "dbname=" . DB . ";"
                . "user=" . USER . ";"
                . "password=" . PASSWORD . ";"
                . "charset=" . CHARSET;

            $options = [
                PDO::ATTR_ERRMODE           =>  PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES  => FALSE,
            ];

            $pdo = new PDO($connection, USER, PASSWORD, $options);

            return $pdo;
        } catch (PDOException $e) {
            require_once("dberror.php");
        }
    }
