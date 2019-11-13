<?php

class Database extends PDO {
    /**
     * Database constructor.
     * @param string $username
     * @param string $passwd
     */
    function __construct($dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST) {
        parent::__construct($dsn, DB_USER, DB_PASS);
    }
}