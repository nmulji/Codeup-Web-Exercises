<?php

require_once 'parks_credentials.php';

require_once 'parks_connect.php';

require_once 'park_seeder.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";
