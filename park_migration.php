<?php

require_once 'parks_credentials.php';

require_once 'parks_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";