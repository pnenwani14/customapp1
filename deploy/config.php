<?php

/**
 * Configuration for database connection
 *
 */

$host       = "php-mysql";
$username   = "root";
$password   = "abcd1234";
$dbname     = "test";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );