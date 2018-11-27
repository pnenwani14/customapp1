<?php

/**
 * Configuration for database connection
 *
 */

$host       = "HOSTNAME";
$username   = "DBUSER";
$password   = "DBPASSWD";
$dbname     = "DBNAME";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );