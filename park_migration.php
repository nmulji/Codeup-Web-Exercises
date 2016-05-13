<?php

require_once 'parks_credentials.php';

require_once 'parks_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$delete_table_national_parks = 'DROP TABLE IF EXISTS national_parks';

$dbc->exec($delete_table_national_parks);