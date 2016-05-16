<?php

require_once 'parks_credentials.php';

require_once 'parks_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$delete_table_national_parks = 'DROP TABLE IF EXISTS national_parks';

$create_table_national_parks = 'CREATE TABLE national_parks (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    location VARCHAR(100) NOT NULL,
    date_established DATE NOT NULL,
    area_in_acres DOUBLE NOT NULL,
    description VARCHAR(100) DEFAULT "NONE",
    PRIMARY KEY (id)
)';

$dbc->exec($delete_table_national_parks);
$dbc->exec($create_table_national_parks);

require_once 'park_seeder.php';

