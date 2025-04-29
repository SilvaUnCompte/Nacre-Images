<?php

global $db;
$DB_PORT = "3306";

$DB_HOST = "host";
$DB_USERNAME = "user";
$DB_PASSWORD = "password";
$DB_NAME = "db";

// $DB_HOST = 'host';
// $DB_NAME = 'db';
// $DB_USERNAME = 'user';
// $DB_PASSWORD = 'BWAHAHAHAH';

// Use env variables to connect to the database
try {
    $cnx = 'mysql:host=' . $DB_HOST . ';port=' . $DB_PORT . ';dbname=' . $DB_NAME . '';
    $options = array(
        PDO::MYSQL_ATTR_SSL_CA => ROOT_DIR . "../../../../etc/ssl/certs/ca-certificates.crt", // TODO: Change this path
    );
    $db = new PDO($cnx, $DB_USERNAME, $DB_PASSWORD);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}