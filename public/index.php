<?php
require __DIR__ . '/../vendor/autoload.php';

require '../helpers.php';

use Framework\Database;

$config = require '../config/db.php';

inspectAndDie($config);
